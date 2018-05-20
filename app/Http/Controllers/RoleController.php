<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }

        $params['roles'] = Role::all();
        $params['permissions'] = Permission::get();
        $params['page_name'] = 'Roles';
        return view('admin.roles.index')->with($params);
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Added Role");
        return response()->json([
            'msg' => "Role Added Successfully!",
            'type' => "true"
        ], 200);
    }

    public function getEditInfo(Request $request)
    {
        try {
            $params['role'] = Role::find($request->role_id);
            $params['permissions'] = Permission::get();
            return view('admin.roles.partials._roles_details_')->with($params);
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $role = Role::findOrFail($request->role_id);
        $role->update($request->except('permission','role_id'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Updated role");
        return response()->json([
            'msg' => "role Updated Successfully!",
            'type' => "true"
        ], 200);
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        $role->delete();

        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Deleted Role");
        return response()->json([
            'msg' => "Role Deleted Successfully!",
            'type' => "true"
        ], 200);
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('users_manage', 'admin')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
