<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClaimController extends BaseCustomerDashboardController
{
    public function index(Request $request){
        if ($request->ajax()) {
            $columns = array(
                0 => 'title',
                1 => 'brand',
                2 => 'category_id',
                3 => 'detail_status',
                4 => 'created_at',
                5 => 'action',
            );
            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = DB::table('reports as r')
                ->join('claim_user as cu', 'cu.report_id', 'r.id')
                ->join('categories as c', 'r.category_id', 'c.id')
                ->select(
                    'r.slug',
                    'r.title',
                    'r.brand',
                    'c.name as category',
                    'cu.created_at',
                    'cu.detail_status',
                )->where('cu.user_id', auth()->user()->id);
            $query->where(function($query) use($search) {
                $query->where('r.title', 'like', $search . '%')
                    ->orWhere('r.brand', 'like', $search . '%')
                    ->orWhere('c.name', 'like', $search . '%');
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
                    $nestedData['slug'] = $v->slug;
                    $nestedData['item_name'] = ucwords($v->title);
                    $nestedData['brand'] = $v->brand ? ucwords($v->brand) : 'Not Specified';
                    $nestedData['category'] = ucwords($v->category);
                    $nestedData['claimed_date'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['detail_status'] = ucwords($v->detail_status);
                    $nestedData['action'] = \View::make('customer_dashboard.claim._action')->with('r',$v)->render();
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
        return view('customer_dashboard.claim.index');
    }

    public function show($slug){
        $report = Report::where('slug', $slug)->with('category')->first();
        $user = Auth::user();
        if($report){
            $claim_user = DB::table('claim_user')->where('report_id', $report->id)->where('user_id', $user->id)->first();
            if(!$claim_user){
                abort(404);
            }
            $location = Location::where('report_id', $report->id)->first();
            $item_images = DB::table('item_images')->where('report_id', $report->id)->where('claimed_by', $user->id)->get();
            return view('customer_dashboard.claim.show', compact('report', 'location', 'claim_user', 'item_images', 'user'));
        }
        abort('404');
    }
}
