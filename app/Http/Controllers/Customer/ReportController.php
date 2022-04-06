<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $columns = array(
                0 => 'title',
                1 => 'brand',
                2 => 'category_id',
                3 => 'verified',
                4 => 'created_at',
                5 => 'action',
            );
            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = DB::table('reports as r')
                ->join('categories as c', 'r.category_id', 'c.id')
                ->select(
                    'r.slug',
                    'r.id',
                    'r.title',
                    'r.brand',
                    'c.name as category',
                    'r.verified',
                    'r.created_at',
                )->where('reported_by', auth()->user()->id);
            $query->where(function($query) use($search) {
                $query->where('r.title', 'like', $search . '%')
                    ->orWhere('r.brand', 'like', $search . '%')
                    ->orWhere('c.name', 'like', $search . '%')
                    ->orWhere('r.created_at', 'like', $search . '%');
            });
            $totalData = $query->count();
            $query->orderBy($order, $dir);
            if ($limit != '-1') {
                $query->offset($start)->limit($limit);
            }
            $records = $query->get();
            $totalFiltered = $totalData;
            $data = array();
            if (isset($records)) {
                foreach ($records as $k => $v) {
                    $nestedData['id'] = $v->id;
                    $nestedData['slug'] = $v->slug;
                    $nestedData['item_name'] = ucwords($v->title);
                    $nestedData['brand'] = $v->brand ? ucwords($v->brand) : 'Not Specified';
                    $nestedData['category'] = ucwords($v->category);
                    $nestedData['verified'] = $v->verified;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('customer_dashboard.report._action')->with('r',$v)->render();
                    $data[] = $nestedData;
                }
            }
            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            ], 200);
        }
        return view('customer_dashboard.report.index');
    }
    public function show($report){
        $report = Report::where('slug', $report)->with(['category', 'claimUsers'=>function($q){
            $q->where('detail_status',Report::DETAIL_STATUS[1]);
        }])->first();
        if(!$report || $report->reported_by != auth()->user()->id){
            abort(400);
        }
        $location = Location::where('report_id', $report->id)->first();
        return view('customer_dashboard.report.show', compact('report', 'location'));
    }

    public function claimShow($user,$report){
        $user = User::where('slug', $user)->first();
        $report = Report::where('slug', $report)->first();
        if((!$user || !$report) || ($report->reported_by !== auth()->user()->id)){
            abort(404);
        }
        $item_images = DB::table('item_images')->where('report_id', $report->id)->where('claimed_by', $user->id)->get();
        $claim_detail = \DB::table('claim_user')->where('report_id', $report->id)->where('user_id', $user->id)->first();
        if(!$claim_detail){
            abort(404);
        }
//        $item_images = ItemImage::where('report_id', $report->id)->where('claimed_by', $user->id)->get();
        return view('customer_dashboard.report.claim.show', compact('claim_detail','user', 'report', 'item_images'));
    }
}
