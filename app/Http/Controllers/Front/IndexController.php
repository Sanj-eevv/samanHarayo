<?php

namespace App\Http\Controllers\Front;

use App\Helpers\AppHelper;
use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\FoundReport;
use App\Models\LostReport;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function index(){
        $featured_reports   = Feature::with(['report' => function($q){
            $q->where('verified_user', null);
        }])->get();
        $found_reports = Report::with('randomImage')->where('report_type', Report::REPORT_TYPE_FOUND)->where('verified', 1)->where('verified_user', null)->orderBy('created_at', 'desc')->take(12)->get();
        $lost_reports  = Report::with(['randomImage', 'reward'])->where('report_type', Report::REPORT_TYPE_LOST)->where('verified', 1)->where('verified_user', null)->orderBy('created_at', 'desc')->take(12)->get();
        return view('welcome', compact('featured_reports', 'found_reports', 'lost_reports'));
    }

    public function show($slug,  Request $request){
        $report = Report::where('slug',$slug)->first();
        if(!$report || $report->verified_user != null || !$report->verified){
            abort(404);
        }
        $disabled = false;
        if(Auth::check()){
            if($report->reported_by === \auth()->user()->id){
                $disabled = true;
            }
        }
        $report->load('itemImages', 'category', 'reward', 'location');
        return view('front.details', compact('report', 'disabled'));
    }

    public function listing(Request $request){
        if($request->ajax()){
            $type = $request->input('type') ? 'found' : 'lost' ;
            $meta['order'] = $request->input('order') ? 'title' : 'created_at';
            $page = $request->input('page') ;
            $meta['page'] = $page ?? 1;
            $meta = SamanHarayoHelper::defaultTableInput($meta);
            $query = Report::with(['category'=>function($q) use($meta){
                $q->where('name', 'like',  $meta['search'].'%');
            }, 'reward', 'randomImage'])->where('verified', 1)->where('verified_user', null);
            $query = $query->where('report_type', $type);
            $query = $query->where(function($q) use($meta){
                    $q->where('title', 'like', $meta['search'] . '%')
                    ->orWhere('created_at', 'like', $meta['search'] . '%');
            });
             return $this->offsetAndSort($query, $meta);
        }
        return view('front.listing');
    }

    public function offsetAndSort($query, $meta){
        $total = $query->count();
        $meta = SamanHarayoHelper::additionalMeta($meta, $total);
        $query->orderBy($meta['order'], $meta['dir']);
        if ($meta['perPage'] != '-1') {
            $query->offset($meta['offset'])->limit($meta['perPage']);
        }
        $data = $query->get();
        $results = \View::make('front._partials.listing_card')->with(['reports'=>collect($data)])->render();
        return [
            'results'  => $results,
            'meta'     =>  $meta
        ];
    }

    public function search(Request $request){
        $search = $request->input('search');
        $page = $request->input('page') ?? 1;
        $pageLimit  = 8;
        $offset = ($pageLimit * $page) - $pageLimit;
        $order  = $request->input('order') ?? 'created_at';
        $dir    = $request->input('dir') ?? 'desc';
        $search = $request->input('search') ?? '';
        $query =  Report::with('randomImage', 'reward', 'location', 'category')->where('verified', 1)->where('verified_user', null)->where(function($q)use($search){
            $q->whereRaw( 'LOWER(`title`) like ?', '%'.strtolower($search).'%' )
                ->orWhereRaw( 'LOWER(`description`) like ?', array( $search ) );
        });

        $totalReports = $query->count();
        $query->orderBy($order, $dir);
        $query->offset($offset)->limit($pageLimit);
        $reports = $query->get();
        $metaData = [
            'totalReports'  =>  $totalReports,
            'pageLimit'      => $pageLimit,
            'page'           => $page,
            'order'          => $order,
            'dir'            => $dir
        ];
        return view('front.search',compact('reports','metaData'));
    }
}
