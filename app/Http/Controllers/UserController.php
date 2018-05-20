<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\UserProfile;
use Gate;
use Validator;
use Carbon\Carbon;
use App\Hospital;
use App\HospitalProfile;
use App\HospitalCategory;
use App\State;
use App\Notifications\NewMember;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            return view('auth.register');
        }

        $params['users'] = User::all();
        $params['roles'] = Role::get();
        $params['page_name'] = 'All Users';
        return view('admin.users.index')->with($params);
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

    public function profile()
    {

        $data['page_name'] = "Profile";
        $profile = HospitalProfile::whereEmail(auth()->user()->email)->first();
        $data['states'] = State::all();
        $data['categories'] = HospitalCategory::all();
        $data['hospital'] = Hospital::whereId($profile->hospital_id)->first();
        $data['user'] = User::find(auth()->user()->id);

        return view('user.user_profile.index')->with($data);
    }

    public function forget_password(Request $request)
    {
        $user = User::whereEmail($request('email'))->first();
        if(!$user){
            return response()->json(['warning' => 'user with this email address does not exist!'], 200);
        }
        \Mail::to($user)->send(new Forget($user));
        return response()->json(['success' => 'password reset link has beeen sent to your mail!'], 200);
    }
    
    public function reset($confirm)
    {
        return view('reset');
    }

    public function check_oldpasword(Request $request)
    {
        $user = User::wherePassword($request->password)->first();
        if(!$user){
            return $response = [
                'msg' => "your password not correct.",
                'type' => "false"
            ];
        }
        return $response = [
            'type' => "true"
        ];
    }

    public function reset_confirm(Request $request,$confirm)
    {
        $user = User::whereSlug($confirm)->first();
        if(!$user){
            return $response = [
                'msg' => "your password reset link do not exist.",
                'type' => "false"
            ];
        }
        $user->is_active = 1;
        $user->password = $request->password;
        $user->save();
        return $response = [
            'msg' => "your password reset has been made successfully.",
            'type' => "true"
        ];
    }

    public function activateAccount($slug, $check) {
        if(isset($slug) && $check == "true") {
            $member = User::find($slug,'slug');
            $is_active = $member->is_active;
            if($is_active) {
                \Session::flash("error","Has Account has already been activated. Please login");
                return redirect(url('/login'));
            } 

            $member->is_active = true;
            $member->save();

            \Session::flash("success","Your account has been activated successfully. Please login");
            return redirect(url('/login'));
        } else {
            return redirect(url('/404'));
        }
    }
    
    protected function validator(array $data)
	{		
		$custom_msg = [
			'name'     => 'Fullname is Required',
			'email'         => 'Email is Required',
			'telephone'     => 'Telephone Number is Required',
			'password'      => 'Password & Confirm Password Don not Match',
		];
		
		return Validator::make($data, [
			'name'     => 'required|string|max:255',
			'email'         => 'required|string|email',
			'telephone'     => 'required|string|max:15',
			'password'      => 'required|string|min:6',
		],$custom_msg);
    }
    
    public function store(Request $request)
    {
        $data = $request->except('_except');
        if(isset($data) && $data['req'] == 'register_new_user') {
            \DB::beginTransaction();
            try {
                $validate = $this->validator($request->except('_token'));
                if($validate->fails()) {
                    return $response = [
                        'msg' => "Invalid Input",
                        'type' => 'false'
                    ];
                }

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
                $user->email    = $data['email'];
                $user->password =($data['password']) ? $data['password'] : '123456' ;
                $user->save();

                $profile = new UserProfile();
                $profile->user_id = $user->id;
                $profile->slug = bin2hex(random_bytes(64));
                $profile->name = $data['name'];
                $profile->telephone = $data['telephone'];
                //$profile->sex = $data['gender'];
                $profile->save();

                $roles = ($request->input('roles')) ? $request->input('roles') : Role::whereName('user')->first()->id;
                $user->assignRole($roles);
                
                //\Mail::to($user->email)->send(new ConfirmRegistration($user));
                
                $admin = User::find(1);
                Notification::send($admin, new NewMember($profile));
                
                \DB::commit();
                return response()->json([
                    'msg'   => "Registration Successfull! A Confirmation Code Has Been Sent To Your Mail.",
                    'type'  => "true"
                ],200);

            } catch(Exception $e) {
                \DB::rollback();
                return redirect()->back()->with("error", $e->getMessage());
            }
        }
    }

    public function activate(Request $request,$id)
    {
        $data = $request->except('_token');
        try {
            $user = User::find($id,'slug');
            if($user->is_active == 0){
                $user->is_active = 1;
                $user->save();
                
                activity_logs(auth()->user()->id, $_SERVER['REMOTE_ADDR'], "Activated User Account");                    
                return response()->json([
                    "type"  => "true",
                    "msg"   => "Account activated successfully!"
                ],200);
            }
            $user->is_active = 0;
            $user->save();                

            activity_logs(auth()->user()->id, $_SERVER['REMOTE_ADDR'], "De-Activated User Account");        
            return response()->json([
                "type"  => "true",
                "msg"   => "Account de-activated successfully!"
            ],200);
        } catch(Exception $e) {
            return false;
        }
    }

    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}   
