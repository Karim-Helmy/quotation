<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Labels_Keys extends Model
{
    public function values()
    {
        return $this->hasMany('App\Model\Labels_Values', 'key_id');
    }
}
