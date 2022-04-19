<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class FoundReportController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth','isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view', User::class);
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
            $order  = $columns[$request->input('order.0.column')] ?? $columns[4];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = DB::table('reports as r')
                ->join('categories as c', 'r.category_id', 'c.id')
                ->select(
                    'r.id',
                    'r.title',
                    'r.brand',
                    'c.name as category',
                    'r.verified',
                    'r.created_at',
                )->where('report_type', Report::REPORT_TYPE_FOUND);
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
                    $nestedData['item_name'] = $v->title;
                    $nestedData['brand'] = $v->brand ? ucwords($v->brand) : 'Not Specified';
                    $nestedData['category'] = ucwords($v->category);
                    $nestedData['verified'] = $v->verified;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.found-reports._action')->with('r',$v)->render();
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
        return view('dashboard.found-reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', User::class);
        $report = Report::where('id', $id)->with('category', 'claimUsers', 'itemImages')->first();
        if($report){
           return $report->when($report->report_type === Report::REPORT_TYPE_FOUND, function () use ($id,$report){
                $location = Location::where('report_id', $id)->first();
                return view('dashboard.found-reports.show', compact('report', 'location'));
            });
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
       $this->authorize('update', User::class);
       $report = Report::findOrFail($id);
       $report->verified ? $report->verified = 0 : $report->verified = 1;
       $report->updated_at = now();
       $report->save();
       return response()->json([
           'status'=> 'OK',
           'message' => 'Status Updated',
           'report_status' => $report->verified ? "Verified" : "Pending",
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('destroy', User::class);
        $report = Report::with(['itemImages', 'claimImages'])->where('id', $id)->first();
        $reported_by = $report->reported_by;
        foreach ($report->itemImages as $itemImage){
            Storage::delete('public/uploads/report/'.$reported_by.'/item_image/'.$itemImage->image);
        }
        foreach ($report->claimImages as $claimImage){
            Storage::delete('public/uploads/report/'.$reported_by.'/claimed/'.$claimImage->image);
        }
        $report->delete();
        return response()->json([
            'message' => 'Report Successfully Deleted',
        ], 200);
    }
}
