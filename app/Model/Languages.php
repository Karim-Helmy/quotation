<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public function values()
    {
        return $this->hasMany('App\Model\Labels_Values', 'language_id');
    }


}
