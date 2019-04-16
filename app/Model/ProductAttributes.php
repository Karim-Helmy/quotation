<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
   protected $table = 'product_attributes';
    protected $fillable =
        [
            'id',
            'product_id',
            'language_id',
            'name',
            'medical_name',
            'other_name',
            'description',
        ];
}
