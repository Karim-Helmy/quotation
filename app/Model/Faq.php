<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable =
        [
            'question',
            'slug',
            'answer',
            'category_id',
            'language_id',
        ];
}
