<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\State;
use App\Local;
use App\HospitalCategory;
use Gate;
use App\User;
use App\UserProfile;
use App\HospitalProfile;
use Notification;
use App\Notifications\NewMember;
use App\Mail\ConfirmRegistration;

class HospitalController extends Controller
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

        $params['page_name'] = "Hospitals";
        $params['states'] = State::all();
        $params['categories'] = HospitalCategory::all();
        $params['hospitals'] = Hospital::all();
        return view('admin.hospitals.index')->with($params);
    }

    public function Local(Request $request)
    {
        
        $params['locals'] = Local::where('state_id',$request->state_id)->get();
        return view('admin.hospitals.partials.locals')->with($params);
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
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $data = $request->except('_except');
        if (isset($data)) {
            \DB::beginTransaction();
            try {
                    $hospital = new Hospital();
                    $hospital->slug = bin2hex(random_bytes(64));
                    $hospital->hospital_category_id = $data['category_id'];
                    $hospital->state_id = $data['state_id'];
                    $hospital->local_id = $data['local_id'];
                    $hospital->lat = $data['lat'];
                    $hospital->lng = $data['lng'];
                    $hospital->save();

                    $hospital_profile = new HospitalProfile();
                    $hospital_profile->slug = bin2hex(random_bytes(64));
                    $hospital_profile->hospital_id = $hospital->id;
                    $hospital_profile->name = $data['name'];
                    $hospital_profile->location = $data['location'];
                    $hospital_profile->email = $data['email'];
                    $hospital_profile->phone = $data['telephone'];
                    $hospital_profile->website = $data['website'];
                    $hospital_profile->save();

                    hospital_image_upload($hospital->id,$request->file('icon'));
                    $check_email = User::hasEmail($data['email']);
                    if($check_email) {
                        return response()->json([
                            "msg"   => "This email already exist",
                            "type"  => "false"
                        ]);
                    }
                

                    $user =  new User();
                    $user->slug     = bin2hex(random_bytes(64));
                    $user->name     = $data['name'];
                    $user->sms_code = bin2hex(random_bytes(4));
                    $user->email    = $data['email'];
                    $user->password = '123456' ;
                    $user->save();

                    $profile = new UserProfile();
                    $profile->user_id = $user->id;
                    $profile->slug = bin2hex(random_bytes(64));
                    $profile->name = $data['name'];
                    $profile->telephone = $data['telephone'];
                    $profile->save();

                    $roles = ($request->input('roles')) ? $request->input('roles') : Role::whereName('user')->first()->id;
                    $user->assignRole($roles);
                
                    \Mail::to($user->email)->send(new ConfirmRegistration($user));
                    
                    $admin = User::find(1);
                    Notification::send($admin, new NewMember($profile));

                    $ip = $_SERVER['REMOTE_ADDR'];
                    activity_logs(auth()->user()->id, $ip, "Added Hospital");
                    activity_logs(auth()->user()->id, $ip, "Addedd User");
                
                    \DB::commit();
                    return response()->json([
                        'msg'   => "Hospital Added Successfully!",
                        'type'  => "true"
                    ],200);
                
            } catch (Exception $e) {
                \DB::rollback();
                return response()->json([
                    "msg", $e->getMessage()
                ],200);
            }
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    public function getEditInfo(Request $request)
    {
        try {

            $params['hospital'] = Hospital::find($request->hospital_id);
            $params['hospital_profile'] = $params['hospital']->HospitalProfile;
            $params['states'] = State::all();
            $params['categories'] = HospitalCategory::all();

            return view('admin.hospitals.partials._hospital_details_')->with($params);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $data = $request->except('_except');
        if (isset($data)) {
            \DB::beginTransaction();
            try {

                $hospital = Hospital::find($request->hospital_id,'slug');
                $hospital->hospital_category_id = $data['category_id'];
                $hospital->state_id = $data['state_id'];
                $hospital->local_id = $data['local_id'];
                $hospital->lat = $data['lat'];
                $hospital->lng = $data['lng'];
                $hospital->save();

                $hospital_profile = HospitalProfile::whereHospitalId($hospital->id)->first();
                $hospital_profile->name = $data['name'];
                $hospital_profile->location = $data['location'];
                $hospital_profile->email = $data['email'];
                $hospital_profile->phone = $data['telephone'];
                $hospital_profile->website = $data['website'];
                $hospital_profile->save();

                hospital_image_upload($hospital->id,$data['file']['icon']);

                $ip = $_SERVER['REMOTE_ADDR'];
                activity_logs(auth()->user()->id, $ip, "Updated Hospital");

                \DB::commit();
                return response()->json([
                    'msg'   => "Hospital Updated Successfully!",
                    'type'  => "true"
                ],200);
            } catch (Exception $e) {
                \DB::rollback();
                return response()->json([
                    "msg", $e->getMessage()
                ],200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }

        $hospital = Hospital::findOrFail($id);
        $hopital->HospitalProfile->delete();
        $hospital->delete();

        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Deleted Hospital Category");

        return response()->json([
            'msg' => "Hospital Category Deleted Successfully!",
            'type' => "true"
        ], 200);
    }
}
