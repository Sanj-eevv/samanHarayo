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
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function index(){
        $featured_reports   = Feature::with('report')->get();
        $found_reports = Report::with('randomImage')->where('report_type', Report::REPORT_TYPE_FOUND)->where('verified', 1)->orderBy('created_at', 'desc')->take(12)->get();
        $lost_reports  = Report::with(['randomImage', 'reward'])->where('report_type', Report::REPORT_TYPE_LOST)->orderBy('created_at', 'desc')->take(12)->get();
        return view('welcome', compact('featured_reports', 'found_reports', 'lost_reports'));
    }

    public function show($slug,  Request $request){
        $report = Report::where('slug',$slug)->first();
        $report->load('itemImages', 'category', 'reward', 'location');
        return view('front.details', compact('report'));
    }

    public function listing(Request $request){
        if($request->ajax()){
//            dd('a');
            $type = $request->input('type') ? 'found' : 'lost' ;
            $meta['order'] = $request->input('order') ? 'title' : 'created_at';
            $page = $request->input('page') ;
            $meta['page'] = $page ?? 1;
            $meta = SamanHarayoHelper::defaultTableInput($meta);
            $query = \DB::table('reports as r')
                ->join('categories as c', 'r.category_id', 'c.id')
                ->leftJoin('rewards as re', 're.report_id', 'r.id')
                ->leftJoin('item_images as i',function($q){
                    $q->on('r.id','=', DB::raw('(SELECT max(report_id) FROM item_images WHERE i.report_id = r.id group by i.report_id limit 1)')
                    );
                    })
                ->select(
                    'r.id', 'r.title', 'r.description', 'r.slug', 'r.report_type', 'r.created_at', 'r.reported_by', 'r.created_at',
                    'c.name',
                    're.reward_amount',
                    'i.image'
                );
            $query->where('verified', 1);
            $query->where('report_type', $type);
            $query->where(function($q) use($meta){
                $q->orWhere('c.name', 'like', $meta['search'] . '%')
                    ->orWhere('r.title', 'like', $meta['search'] . '%')
                    ->orWhere('r.created_at', 'like', $meta['search'] . '%');
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
}
