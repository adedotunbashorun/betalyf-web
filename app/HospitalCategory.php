<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalCategory extends Model
{
	protected $fillable = ['name'];

	public static function find($id, $field = null){
		if($field){
			return self::where($field, '=', $id)->firstOrFail();
		}
		return self::where('id', '=', $id)->firstOrFail();
	}
	
	public function Hospital(){
		return $this->hasMany("App\Hospital",'hospital_category_id');
	}
}
