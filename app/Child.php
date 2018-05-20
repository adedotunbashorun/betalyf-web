<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'full_name', 'email', 'gender', 'dob'
    ];
}
