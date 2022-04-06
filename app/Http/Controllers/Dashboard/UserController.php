<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends BaseDashboardController
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
                0 => 'first_name',
                1 => 'last_name',
                2 => 'email',
                3 => 'role',
                4 => 'created_at',
                5 => 'action',
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = DB::table('users as u')
                ->join('roles as r', 'r.id', 'u.role_id')
                ->select(
                    'u.id',
                    'u.first_name',
                    'u.last_name',
                    'u.email',
                    'u.created_at',
                    'r.label as role'
                );
            $query->where('u.first_name', 'like', $search . '%')
                ->orWhere('u.last_name', 'like', $search . '%')
                ->orWhere('u.email', 'like', $search . '%')
                ->orWhere('r.label', 'like', $search . '%')
                ->orWhere('u.created_at', 'like', $search . '%');
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
                    $nestedData['first_name'] = $v->first_name;
                    $nestedData['last_name'] = $v->last_name;
                    $nestedData['email'] = $v->email;
                    $nestedData['role'] = $v->role;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.users._action')->with('r',$v)->render();
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
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $user = new User();
        $roles = Role::pluck('label', 'id');
        return view('dashboard.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);
        $user = User::create([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'slug'              => SamanHarayoHelper::uniqueSlugify($request->input('last_name'), User::class, null, 'slug'),
            'email'             => $request->input('email'),
            'role_id'           => $request->input('role_id'),
            'current_image'     => null,
            'identity_front'    => null,
            'identity_back'     => null,
            'avatar'            => null,
            'facebook_id'             => null,
            'google_id'         => null,
            'email_verified_at' => now(),
            'password'          => $request->input('password')
        ]);
        return redirect()->route('users.show', compact('user'))->with('alert.success', 'User Successfully Created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', User::class);
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', User::class);
        $roles = Role::pluck('label', 'id');

        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', User::class);
        User::where('id', $user->id)->update([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'email'             => $request->input('email'),
            'role_id'           => $request->input('role_id'),
            'updated_at'        => now(),
        ]);
        return redirect()->route('users.show', compact('user'))->with('alert.success', 'User Successfully Updated !!');
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
            $user = User::where('id', $id)->first();
        /** Storage points to storage/app */
            Storage::delete('public/uploads/users/'.$user->id);
            Storage::delete('public/uploads/report/'.$user->id);
        $user->delete();
        return response()->json([
            'message' => 'User Successfully Deleted',
        ], 200);
    }
}
