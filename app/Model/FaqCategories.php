<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FaqCategories extends Model
{
    protected $fillable =[
        'language_id',
        'category',
    ];

    public function faq()
    {
        return $this->hasMany('App\Model\Faq', 'category_id');
    }
}
