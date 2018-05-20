<?php

namespace App\Http\Controllers;

use App\ChildSchedule;
use Illuminate\Http\Request;
use Validator;
use App\Child;
use Carbon\Carbon;

class ChildScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page'] = 'Routine Immunization Schedule';
        return view('website.RI-Schedule.index')->with($data);
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
    protected function validator(array $data)
    {
        $msg = [
            'full_name' => 'Fullname is Required',
            'email' => 'Email is required',
            'gender' => 'Childs Gender is required',
            'dob' => 'Childs Date Of Birth is required'
        ];


        return Validator::make($data, [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gender' => 'required|string|max:7',
            'dob' => 'required',
        ], $msg);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_except');
        \DB::beginTransaction();
        try {
            $validate = $this->validator($request->except('_token'));
            if ($validate->fails()) {
                return $response = [
                    'msg' => $validate->errors(),
                    'type' => 'false'
                ];
            }
            $check = Child::whereFullName($data['full_name'])->whereEmail($data['email'])
                    ->whereDob($data['dob'])->first();
            if(isset($check)){
                $params['name'] = $check->full_name;
                $routine = ChildSchedule::whereChildId($check->id)->first();
                $params['routines'] = json_decode(json_encode(unserialize($routine->schedule)));
                return view('website.RI-Schedule.partials.schedule')->with($params);
            }

            $child = new Child();
            $child->full_name = $data['full_name'];
            $child->email = $data['email'];
            $child->gender = $data['gender'];
            $child->dob = $data['dob'];
            $child->save();

            $due = strtotime($data['dob']);
            general_child_schedule($child->id,$due);           

			//Mail::to($user->email)->send(new ConfirmRegistration($user));
            $ip = $_SERVER['REMOTE_ADDR'];
            childs_logs($child->id, $ip, "Use Routine Immunization Schedule");

            \DB::commit();

            $routine = ChildSchedule::whereChildId($child->id)->first();
            $params['routines'] = json_decode(json_encode(unserialize($routine->schedule)));
            return view('website.RI-Schedule.partials.schedule')->with($params);

        } catch (Exception $e) {
            \DB::rollback();
            return $response = [
                'msg' => "Internal Server Error",
                'type' => "false"
            ];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChildSchedule  $childSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ChildSchedule $childSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChildSchedule  $childSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildSchedule $childSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChildSchedule  $childSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildSchedule $childSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChildSchedule  $childSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildSchedule $childSchedule)
    {
        //
    }
}
