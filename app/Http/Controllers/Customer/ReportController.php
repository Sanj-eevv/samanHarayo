<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Report;
use App\Models\User;
use App\Notifications\ClaimReportStatusRejected;
use App\Providers\ClaimReportStatusRejectedEvent;
use App\Providers\ClaimReportStatusVerifiedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends BaseCustomerDashboardController
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
        $report = Report::where('slug', $report)->where('reported_by', auth()->user()->id)
            ->with(['category','itemImages','verifiedUser','location','claimUsers'=>function($q){
                $q->where('detail_status',Report::DETAIL_STATUS[1])
                    ->where('report_status', Report::REPORT_STATUS[0]);
            }])->first();
        abort_if(!$report, 404);
        return view('customer_dashboard.report.show', compact('report'));
    }

    public function claimShow($user,$report){
        $user = User::where('slug', $user)->first();
        $report = Report::where('slug', $report)->first();
        if(!$user || !$report || $report->reported_by !== auth()->user()->id){
            abort(404);
        }
        $item_images = DB::table('item_images')->where('report_id', $report->id)->where('claimed_by', $user->id)->get();
        $claim_detail = \DB::table('claim_user')->where('report_id', $report->id)->where('user_id', $user->id)->first();
        if(!$claim_detail){
            abort(404);
        }
        return view('customer_dashboard.report.claim.show', compact('claim_detail','user', 'report', 'item_images'));
    }

    public function verify(Request $request,$user,$report){
        $request->validate([
            'report_status' => 'required,in:pending,verified,rejected',
        ]);
        $user = User::where('slug', $user)->first();
        $report = Report::where('slug', $report)->first();
        $status = $request->input('report_status');
        abort_if(!$user || !$report || $report->reported_by !== auth()->user()->id, 404);

        if($status === Report::REPORT_STATUS[0]){
            return redirect()->back()->with('toast.error', 'Select other options');
        }
        $claim_detail = \DB::table('claim_user')->where('report_id', $report->id)->where('user_id', $user->id)->first();
        if(!$claim_detail){
            abort(404);
        }
        if($claim_detail->report_status === Report::REPORT_STATUS[0]){
        DB::beginTransaction();
        try {

                 \DB::table('claim_user')->where('report_id', $report->id)->where('user_id', $user->id)->update([
                    'report_status'         =>          $status
                ]);
                if($status === Report::REPORT_STATUS[1]){
                    $report->verified_user = $user->id;
                    $report->save();

                    DB::table('claim_user')->where('report_id', $report->id)->where('report_status', Report::REPORT_STATUS[0])
                        ->update([
                            'report_status'         =>          Report::REPORT_STATUS[2],
                        ]);
                    event(new ClaimReportStatusVerifiedEvent($user, $report));
                }else{
                    event(new ClaimReportStatusRejectedEvent($user, $report));
                }
            }catch (\Exception $e){
                DB::rollBack();
                return redirect()->back()->with('toast.error', 'Could not update status');
            }
        }else{
            return redirect()->back()->with('toast.error', 'Could not update status');
        }
        DB::commit();
        return redirect()->back()->with('toast.success', 'Report status updated successfully');
    }
}
