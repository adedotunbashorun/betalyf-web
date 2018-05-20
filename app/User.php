<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function find($id, $field = null){
        if($field){
            return self::where($field, '=', $id)->firstOrFail();
        }
        return self::where('id', '=', $id)->firstOrFail();
    }

    public function setPasswordAttribute($query) {
        return $this->attributes['password'] = bcrypt($query);
    }

    public function setFullNameAttribute($value) {
        return $this->attributes['name'] = ucwords($value);
    }

    public function setEmailAttribute($value) {
        return $this->attributes['email'] = preg_replace('/\s/', '', strtolower($value));
    }
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    public static function hasEmail($field) 
    {
        $check = self::where('email',$field)->first();
        return ($check);
    }

    public function scopeUserProfile($query) {
        return $query->where('id',auth()->user()->id)->first();
    }
}
