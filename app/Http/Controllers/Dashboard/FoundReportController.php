<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FoundReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $columns = array(
                0 => 'name',
                1 => 'brand',
                2 => 'category_id',
                3 => 'verified',
                4 => 'created_at',
                5 => 'action',
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = DB::table('reports as r')
                ->join('categories as c', 'r.category_id', 'c.id')
                ->select(
                    'r.id',
                    'r.name',
                    'r.brand',
                    'c.name as category',
                    'r.status',
                    'r.created_at',
                );
            $query->where('r.name', 'like', $search . '%')
                ->orWhere('r.brand', 'like', $search . '%')
                ->orWhere('c.name', 'like', $search . '%')
                ->orWhere('r.status', 'like', $search . '%')
                ->orWhere('r.created_at', 'like', $search . '%');
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
                    $nestedData['item_name'] = $v->name;
                    $nestedData['brand'] = $v->brand ?? 'Not Specified';
                    $nestedData['category'] = $v->category;
                    $nestedData['status'] = $v->status;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
//        $this->authorize('view', User::class);
        $report = Report::where('id', $id)->with('category')->first();
        $location = Location::where('report_id', $id)->first();
        return view('dashboard.found-reports.show', compact('report', 'location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       $report = Report::findOrFail($id);
       $report->status = Str::lower($request->status);
       $report->updated_at = now();
       $report->save();
       return response()->json([
           'status'=> 'OK',
           'message' => 'Status Updated'
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
//        $this->authorize('destroy', User::class);
        Report::where('id', $id)->delete();
        return response()->json([
            'message' => 'Report Successfully Deleted',
        ], 200);
    }
}