<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Beneficiary;
use Validator;
use App\User;
use Twilio;
use Nexmo;
use App\Mail\Beneficiarys;
use App\Notifications\Beneficiaries;

class BeneficiaryController extends Controller
{
	
	
	
	/**
	* Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
    public function index()
    {
		$params['page_name'] = 'All Beneficiary';
		$beneficiary = Beneficiary::all();
		foreach ($beneficiary as $key => $b) {
			//T			wilio::message($b->telephone, "Dear ".$b->parent_name.", your child is due for immunization.");
		}
		$params['beneficiaries'] = Beneficiary::UserBeneficiaries()->get();
		return view('user.child.index')->with($params);
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
        $custom_msg = [
                    //'		child_name' => 'Fullname is Required',
            'parent_name' => 'Fullname is Required',
            'email' => 'Email is Required',
            'telephone' => 'Telephone Number is Required',
            //'dob' => "Child's  Date Of Birth is Required",
        ];
		return Validator::make($data, [
            //'child_name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'telephone' => 'required|string|max:15',
            //'dob' => 'required',
        ], $custom_msg);
	}
	public function store(Request $request)
	{
		$data = $request->except('_except');
		if (isset($data)) {
			\DB::beginTransaction();
			try {
				$validate = $this->validator($request->except('_token'));
				if ($validate->fails()){
					return $response = [
                        'msg' => "Invalid Input",
                        'type' => 'false'
                    ];
				}
				// 				check if beneficiary exist.
				$beneficiary = new Beneficiary();
				$beneficiary->slug = bin2hex(random_bytes(64));
				$beneficiary->user_id = auth()->user()->id;
				$beneficiary->child_name = ($data['child_name']) ? $data['child_name'] :"NULL";
				$beneficiary->parent_name = $data['parent_name'];
				$beneficiary->email = $data['email'];
				$beneficiary->gender = ($data['gender']) ? $data['gender'] : 0;
				$beneficiary->telephone = $data['telephone'];
				$beneficiary->dob = ($data['dob']) ? $data['dob'] : \Carbon\Carbon::now();
                $beneficiary->save();
                
                Twilio::message($data['telephone'], "Dear ".$data['parent_name'].", Congratulations on the birth of your baby. Your child is due for BCG, OPV0 and HPV1 vaccines today.");
                
				$due = strtotime($data['dob']);
				beneficiary_schedule($beneficiary->id,$due);
				\Mail::to($beneficiary->email)->send(new Beneficiarys($beneficiary));
				$admin = User::find(1);
				Notification::send($admin, new Beneficiaries($beneficiary));
				\DB::commit();
				return response()->json([
                    'msg' => "Beneficiary Added Successfully.",
                    'type' => "true"
                ], 200);
			}
			catch (Exception $e) {
				\DB::rollback();
				return response()->json([
                    "msg", $e->getMessage()
                ],200);
			}
		}
	}
	public function getEditInfo(Request $request)
	{
		try {
			$params['beneficiary'] = Beneficiary::find($request->beneficiary_id);
			return view('user.child.partials._beneficiary_details_')->with($params);
		}
		catch (Exception $e) {
			return false;
		}
	}
	/**
	* Display the specified resource.
	     *
	     * @param  \App\Beneficiary  $beneficiary
	     * @return \Illuminate\Http\Response
	     */
    public function show($id)
    {
		try {
			$beneficiary = Beneficiary::find($id);
			$params['page_name'] = $beneficiary->child_name."'s Schedule";
			$params['routines'] = json_decode(json_encode(unserialize($beneficiary->Schedule->schedule)));
			return view('user.child.show')->with($params);
		}
		catch (Exception $e) {
			return false;
		}
	}
	/**
	* Show the form for editing the specified resource.
	     *
	     * @param  \App\Beneficiary  $beneficiary
	     * @return \Illuminate\Http\Response
	     */
    public function edit(Beneficiary $beneficiary)
    {
		//
	}
	/**
	* Update the specified resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @param  \App\Beneficiary  $beneficiary
	     * @return \Illuminate\Http\Response
	     */
    public function update(Request $request)
    {
		$data = $request->except('_except');
		if (isset($data)) {
			\DB::beginTransaction();
			try {
				$validate = $this->validator($request->except('_token'));
				if ($validate->fails()) {
                    return $response = [
                        'msg' => "Invalid Input",
                        'type' => 'false'
                    ];
				}
				$beneficiary = Beneficiary::find($data['beneficiary_id'],'slug');
				$beneficiary->child_name = $data['child_name'];
				$beneficiary->parent_name = $data['parent_name'];
				$beneficiary->email = $data['email'];
				$beneficiary->gender = $data['gender'];
				$beneficiary->telephone = $data['telephone'];
				$beneficiary->dob = $data['dob'];
				$beneficiary->save();
				$due = strtotime($data['dob']);
				beneficiary_schedule($beneficiary->id, $due);
				\DB::commit();
				return response()->json([
                    'msg' => "Beneficiary Updated Successfully.",
                    'type' => "true"
                ], 200);
			}
			catch (Exception $e) {
				\DB::rollback();
				return response()->json([
                    "msg", $e->getMessage()
                ], 200);
			}
		}
	}
	/**
	* Remove the specified resource from storage.
	     *
	     * @param  \App\Beneficiary  $beneficiary
	     * @return \Illuminate\Http\Response
	     */
    public function destroy(Beneficiary $beneficiary)
    {
		//
	}
}
