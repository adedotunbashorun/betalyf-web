<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
	public static function find($id, $field = null){
		if($field){
			return self::where($field, '=', $id)->firstOrFail();
		}
		return self::where('id', '=', $id)->firstOrFail();
	}
	
	public function Category(){
		return $this->belongsTo(HospitalCategory::class,'hospital_category_id');
	}
	
	public function State(){
		return $this->belongsTo(State::class);
	}
	
	public function Local(){
		return $this->belongsTo(Local::class,'local_id');
	}
	
	public function HospitalProfile()
	{
		return $this->hasOne(HospitalProfile::class);
	}
	
	public function Gallery(){
		return $this->hasMany(Gallery::class);
	}
	
	public function Review(){
		return $this->hasMany(Review::class);
	}
}
