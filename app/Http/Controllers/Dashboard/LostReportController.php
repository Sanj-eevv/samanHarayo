<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Location;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LostReportController extends BaseDashboardController
{
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
                3 => 'created_at',
                4 => 'action',
            );

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = DB::table('reports as r')
                ->join('categories as c', 'r.category_id', 'c.id')
                ->select(
                    'r.id',
                    'r.title',
                    'r.brand',
                    'c.name as category',
                    'r.created_at',
                )->where('report_type', Report::REPORT_TYPE_LOST);
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
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.lost-reports._action')->with('r',$v)->render();
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
        return view('dashboard.lost-reports.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', User::class);
        $report = Report::where('id', $id)->with('category', 'itemImages', 'claimUsers', 'location')->first();
        if($report){
            return $report->when($report->report_type === Report::REPORT_TYPE_LOST, function () use ($id,$report){
                return view('dashboard.lost-reports.show', compact('report'));
            });
        }
        abort(401);
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
        $report = Report::with(['itemImages', 'claimImages' ,'feature'])->where('id', $id)->first();
        $reported_by = $report->reported_by;
        foreach ($report->itemImages as $itemImage){
            Storage::delete('public/uploads/report/'.$reported_by.'/item_image/'.$itemImage->image);
        }
        foreach ($report->claimImages as $claimImage){
            Storage::delete('public/uploads/report/'.$reported_by.'/claimed/'.$claimImage->image);
        }
        if($report->feature){
            Storage::delete('public/uploads/report/'.$reported_by.'/feature_image/'.$report->feature->feature_image);
        }
        $report->delete();
        return response()->json([
            'message' => 'Report Successfully Deleted',
        ], 200);
    }
}
