<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Consultants extends Model
{
    public function get_images()
    {
        return $this->hasMany('App\Model\Consultants_Images', 'consultant_id');
    }

    public function doctors()
    {
        return $this->belongsToMany('App\User', 'consultants__doctors', 'consultant_id', 'doctor_id');
    }

    public function doctor_replay()
    {
        return $this->belongsToMany('App\User', 'consultants__doctors__replay', 'consultant_id', 'doctor_id')->withPivot('replay');
    }

}
