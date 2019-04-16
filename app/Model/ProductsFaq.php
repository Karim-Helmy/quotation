<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsFaq extends Model
{
   protected $table = 'products_faq';
    protected $fillable =
        [
            'id',
            'product_id',
            'language_id',
            'question',
            'answer',
        ];


    



}
