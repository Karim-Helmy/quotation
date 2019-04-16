<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";
    protected $fillable =
        [
            'id',
            'sitename',
            'logo',
            'favicon',
            'email',
            'facebook',
            'twitter',
            'youtube',
            'description',
            'keywords',
            'status',
            'message_mentenance',
        ];
}
