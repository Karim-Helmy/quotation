<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Labels_Values extends Model
{
    protected $fillable =
    [
        'key_id',
        'language_id',
        'value',
    ];
    public function language()
    {
        return $this->belongsTo('App\Model\Languages', 'language_id');
    }

    public function values_key()
    {
        return $this->belongsTo('App\Model\Labels_Keys', 'key_id');
    }
}
