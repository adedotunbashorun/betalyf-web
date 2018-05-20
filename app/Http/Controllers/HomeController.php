<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Hospital;
use App\State;
//use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('mapIndex','map');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->is_active == 0) {
            auth()->logout();
            \Session::flash('error', 'Your account is not activated! Please check your email and activate your account');
            return redirect('/login');
        }
        if(Gate::allows('admin')){
            $data['page_name'] = "Dashboard";
            return view('admin.dashboard.index')->with($data);
        }
        $data['page_name'] = "Dashboard";        
        return view('user.dashboard.index')->with($data);
    }

    public function indexNotify()
    {
        return view('admin.partials.util._notification');
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }

    public function read(Request $request,$id)
    {
        \Auth::user()->unreadNotifications()->find($id)->markAsRead();
        return back();
    }

    public function loadDispute()
    {
        $data['disputes'] = Dispute::all();
        return view('admin.partials.util._show_dispute')->with($data);
    }

    public function loadMembers()
    {
        $data['members'] = User::members()->orderBy('id', 'DESC')->limit(10)->get();
        return view('admin.partials.util._new_members')->with($data);
    }

    public function loadActivityLogs()
    {
        $data['activities'] = ActivityLog::orderBy('id', 'DESC')->limit(10)->get();
        return view('admin.partials.util._activity_logs')->with($data);
    }

    public function loadActivityLogsOne()
    {
        $data['activities'] = ActivityLog::userActivities()->orderBy('id', 'DESC')->limit(10)->get();
        return view('admin.partials.util._activity_logs')->with($data);
    }

    public function loadChart()
    {
        return true;
    }

    public function mapIndex(Request $request)
    {        
        $data['page'] = "Clinics";
        $data['states'] = State::all();
        return view('website.clinic.index')->with($data);
    }

    public function map(Request $request)
    {
        $dataset = [];
        $lat=$request->lat;
    	$lng=$request->lng;
        $hospitals = Hospital::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
        foreach ($hospitals as $key => $hospital) {
            array_push($dataset, [
                'title' => $hospital->HospitalProfile->name,
                'position' => ['lat' => $hospital->lat, 'lng' => $hospital->lng],
                'icon' => 'parking',
                'content' => '<div id="content"><div id="siteNotice"></div><h6>' . $hospital->HospitalProfile->name . '</h6><div id="bodyContent"><p><a href='.$hospital->HospitalProfile->website.'>Website Url</a><b>.</p> <p>'.$hospital->HospitalProfile->location.'</p></div></div>'
            ]);
        }
        return response()->json([
            'dataset' => $dataset
        ]);
    }
}
