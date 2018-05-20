<?php 

use App\ChildSchedule;
use App\HospitalProfile;

function menu_active($current,$id1,$id2=null){
	$active = ($id2) ? (($current[0]==$id1) && isset($current[1]) && ($current[1]==$id2)) : ($current[0]==$id1);
	return ($active) ? "start open active" : "";
}

function activity_logs($user,$ip,$action) {
	if(isset($user) && isset($ip) && isset($action)) {
		$log = new App\ActivityLog();
		$log->user_id = $user;
		$log->slug = bin2hex(random_bytes(64));
		$log->ip = $ip;
		$log->action = $action;
		$log->save();
	}
}

function childs_logs($user,$ip,$action) {
	if(isset($user) && isset($ip) && isset($action)) {
		$log = new App\ActivityLog();
		$log->child_id = $user;
		$log->slug = bin2hex(random_bytes(64));
		$log->ip = $ip;
		$log->action = $action;
		$log->save();
	}
}

function general_child_schedule($child,$due){
	$array_schedule = [
		[
			"age" => "At Birth",
			"vaccine" => "BCG",
			"disease" => "Tuberculosis",
			"date" => date("d-M-Y", $due),
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "OPV0",
			"disease" => "Poliomyelitis",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "HBV1",
			"disease" => "Hepatitis B",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "6 weeks",
			"vaccine" => "OPV1",
			"disease" => "Poliomyelitis",
			"date" => date("d-M-Y", $due + (42 * 24 * 60 * 60)),
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "Penta1",
			"disease" => "Diphtheria, Tetanus,Pertussis, Hepatitis B and Hemophilus Influenza type b",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "PCV1",
			"disease" => "Pneumococcal Conjugate vaccine",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "Rota1",
			"disease" => "Diarrhoea diseases",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "10 weeks",
			"vaccine" => "OPV2",
			"disease" => "Poliomyelitis ",
			"date" => date("d-M-Y", $due + (70 * 24 * 60 * 60)),
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Penta2",
			"disease" => "Diphtheria, Tetanus,Pertussis, Hepatitis B and Hemophilus Influenza type b",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "PCV2",
			"disease" => "Pneumococcal Conjugate vaccine",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Rota2",
			"disease" => "Diarrhoea diseases",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "14 weeks",
			"vaccine" => "OPV3",
			"disease" => "Poliomyelitis",
			"date" => date("d-M-Y", $due + (98 * 24 * 60 * 60)),
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "Penta3",
			"disease" => "Diphtheria, Tetanus,Pertussis, Hepatitis B and Hemophilus Influenza type b",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "PCV3",
			"disease" => "Pneumococcal Conjugate Vaccine",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "IPV",
			"disease" => "Poliomyelitis",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "9 months",
			"vaccine" => "Measles vaccine",
			"disease" => "Measles",
			"date" => date("d-M-Y", $due + (252 * 24 * 60 * 60)),
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Yellow fever vaccine",
			"disease" => "Yellow fever",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Vitamin A",
			"disease" => "Improvement of eyesight",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "15 months",
			"vaccine" => "Vitamin A",
			"disease" => "Improvement of eyesight",
			"date" => date("d-M-Y ", $due + (420 * 24 * 60 * 60)),
			"color" => ""
		]
	];
	$schedule = new ChildSchedule();
	$schedule->child_id = $child;
	$schedule->schedule = serialize($array_schedule);
	$schedule->save();
}

function beneficiary_schedule($child,$due){
	$array_schedule = [
		[
			"age" => "At Birth",
			"vaccine" => "BCG",
			"disease" => "Tuberculosis",
			"date" => date("d-M-Y", $due),
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "OPV0",
			"disease" => "Poliomyelitis",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "HBV1",
			"disease" => "Hepatitis B",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "6 weeks",
			"vaccine" => "OPV1",
			"disease" => "Poliomyelitis",
			"date" => date("d-M-Y", $due + (42 * 24 * 60 * 60)),
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "Penta1",
			"disease" => "Diphtheria, Tetanus,Pertussis, Hepatitis B and Hemophilus Influenza type b",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "PCV1",
			"disease" => "Pneumococcal Conjugate vaccine",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "Rota1",
			"disease" => "Diarrhoea diseases",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "10 weeks",
			"vaccine" => "OPV2",
			"disease" => "Poliomyelitis ",
			"date" => date("d-M-Y", $due + (70 * 24 * 60 * 60)),
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Penta2",
			"disease" => "Diphtheria, Tetanus,Pertussis, Hepatitis B and Hemophilus Influenza type b",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "PCV2",
			"disease" => "Pneumococcal Conjugate vaccine",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Rota2",
			"disease" => "Diarrhoea diseases",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "14 weeks",
			"vaccine" => "OPV3",
			"disease" => "Poliomyelitis",
			"date" => date("d-M-Y", $due + (98 * 24 * 60 * 60)),
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "Penta3",
			"disease" => "Diphtheria, Tetanus,Pertussis, Hepatitis B and Hemophilus Influenza type b",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "PCV3",
			"disease" => "Pneumococcal Conjugate Vaccine",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "",
			"vaccine" => "IPV",
			"disease" => "Poliomyelitis",
			"date" => "",
			"color" => ""
		],
		[
			"age" => "9 months",
			"vaccine" => "Measles vaccine",
			"disease" => "Measles",
			"date" => date("d-M-Y", $due + (252 * 24 * 60 * 60)),
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Yellow fever vaccine",
			"disease" => "Yellow fever",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "",
			"vaccine" => "Vitamin A",
			"disease" => "Improvement of eyesight",
			"date" => "",
			"color" => "#eafaf1"
		],
		[
			"age" => "15 months",
			"vaccine" => "Vitamin A",
			"disease" => "Improvement of eyesight",
			"date" => date("d-M-Y ", $due + (420 * 24 * 60 * 60)),
			"color" => ""
		]
	];

	$check = ChildSchedule::whereBeneficiaryId($child)->first();
	if(isset($check)){
		$check->delete();
	}

	$schedule = new ChildSchedule();
	$schedule->beneficiary_id = $child;
	$schedule->schedule = serialize($array_schedule);
	$schedule->save();
}

function hospital_image_upload($id,$image){
	if(isset($id) && isset($image)) 
	{
		$hospital_profile = HospitalProfile::whereHospitalId($id)->first();
		$imageData = $image;
		if($hospital_profile->marker_image != Null){            
			unlink(public_path() .'/web/img/markers/'. $hospital_profile->marker_image);
		}
		$file=$image;
		$file_ext = $file->getClientOriginalExtension();
		$file_ext = "png";
		$file_name = bin2hex(random_bytes(64)).'.'. $file_ext;
		$upload = $file->move('web/img/markers/',$file_name);
		$hospital_profile->marker_image = $file_name;
		$hospital_profile->save();
	}
}

function word_counter($string,$count,$end) {
	return \Illuminate\Support\Str::words($string,$count,$end);
}
