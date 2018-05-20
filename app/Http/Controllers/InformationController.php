<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }

        $params['informations'] = Information::all();
        $params['page_name'] = 'Informations';
        return view('admin.information.index')->with($params);
    }

    /**
     * Show the form for creating new Information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created Information in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }

        $data = $request->except('_token');
        $information = new Information();
        $information->slug = bin2hex(random_bytes(64));
        $information->subject = $data['subject'];
        $information->message = $data['message'];
        $information->save();

        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Added Information");

        return response()->json([
            'msg'   => "Information Added Successfully!",
            'type'  => "true"
        ],200);
        
    }

    public function getEditInfo(Request $request)
    {
        try {
            $params['information'] = Information::find($request->information_id);
            return view('admin.information.partials._informations_details_')->with($params);
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Show the form for editing Information.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $params['Information'] = Information::findOrFail($id);
        $params['page_name'] = 'Edit Information';
        return view('admin.information.edit')->with($params);
    }

    /**
     * Update Information in storage.
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

        $Information = Information::whereId($data['information_id'])->first();
        $Information->subject = $data['subject'];
        $Information->message = $data['message'];
        $Information->save();
        
        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Updated Information");
        return response()->json([
            'msg'   => "Information Updated Successfully!",
            'type'  => "true"
        ],200);
    }


    /**
     * Remove Information from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $Information = Information::findOrFail($id);
        $Information->delete();
        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Deleted Information");
        return response()->json([
            'msg' => "Information Deleted Successfully!",
            'type' => "true"
        ], 200);
    }

    /**
     * Delete all selected Information at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Information::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
