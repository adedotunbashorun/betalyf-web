<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    /**
     * Display a listing of Permission.
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

        $params['permissions'] = Permission::all();
        $params['page_name'] = 'Permissions';
        return view('admin.permissions.index')->with($params);
    }

    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        Permission::create($request->all());
        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Added Permission");
        return response()->json([
            'msg'   => "Permission Added Successfully!",
            'type'  => "true"
        ],200);
        
    }

    public function getEditInfo(Request $request)
    {
        try {
            $params['permission'] = Permission::find($request->permission_id);
            return view('admin.permissions.partials._permissions_details_')->with($params);
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Show the form for editing Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $params['permission'] = Permission::findOrFail($id);
        $params['page_name'] = 'Edit Permission';
        return view('admin.permissions.edit')->with($params);
    }

    /**
     * Update Permission in storage.
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
        $data = $request->except('_token');
        $permission = Permission::whereId($request->permission_id)->first();
        $permission->name = $data['name'];
        $permission->save();
        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Updated Permission");
        return response()->json([
            'msg'   => "Permission Updated Successfully!",
            'type'  => "true"
        ],200);
    }


    /**
     * Remove Permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);
        $permission->delete();
        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Deleted Permission");
        return response()->json([
            'msg' => "Permission Deleted Successfully!",
            'type' => "true"
        ], 200);
    }

    /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
