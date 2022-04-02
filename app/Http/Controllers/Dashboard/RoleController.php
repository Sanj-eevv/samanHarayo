<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends BaseDashboardController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('isAdmin');
    }

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
                1 => 'description',
                3 => 'created_at',
                4 => 'action',
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('roles as r')
                ->select(
                    'r.id',
                    'r.name',
                    'r.label',
                    'r.preserved',
                    'r.description',
                    'r.created_at',
                );
            $query->where('r.label', 'like', $search . '%')
                ->orWhere('r.description', 'like', $search . '%')
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
                    $nestedData['name'] = $v->label;
                    $nestedData['description'] = $v->description;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.roles._action')->with('r', $v)->render();
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
        return view('dashboard.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $role_permission = [];
        $permissions = $this->getGroupedPermissions();
        return view('dashboard.roles.create', compact('role', 'role_permission', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'label' => $request->input('label'),
            'name' => Str::of($request->input('label'))->camel(),
            'description' => $request->input('description'),
        ]);
        $role->permissions()->sync($request->input('permissions'));
        return redirect()->route('roles.show', compact('role'))->with('alert.success', 'Role Successfully Created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = Role::with('permissions')->findOrFail($role->id);
        $role_permission = \DB::table('permission_role')->where('role_id', $role->id)->pluck('permission_id')->toArray();
        $permissions = $this->getGroupedPermissions();
        return view('dashboard.roles.show', compact('role', 'role_permission', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = Role::with('permissions')->findOrFail($role->id);
        $role_permission = \DB::table('permission_role')->where('role_id', $role->id)->pluck('permission_id')->toArray();
        $permissions = $this->getGroupedPermissions();
        return view('dashboard.roles.edit', compact('role', 'role_permission', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        // $role->label = $request->input('label');
        // $role->name = Str::of($request->input('label'))->camel();
        $role->description = $request->input('description');
        $role->updated_at = date('Y-m-d H:i:s');
        $role->save();
        $role->permissions()->sync($request->input('permissions'));
        return redirect()->route('roles.index')->with('alert.success', 'Role Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Role $role)
    {
        if ($role->preserved == 'yes') {
            return response()->json([
                'message' => 'This Role cannot be deleted',
            ], 403);
        } else {
            $role->delete();
            return response()->json([
                'message' => 'Role Successfully Deleted',
            ], 200);
        }
    }

    public function getGroupedPermissions()
    {
        $permissions = Permission::all();
        $search_arr = [' View', ' Create', ' Update', ' Destroy'];
        $replace_arr = ['', '', '', ''];
        $permissions->each(function ($val, $key) use ($search_arr, $replace_arr) {
            return $val->labelGroup = str_replace($search_arr, $replace_arr, $val->label);
        });
        return $permissions->groupBy('labelGroup')->sortKeys()->toArray();
    }
}
