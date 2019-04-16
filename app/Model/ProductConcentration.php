<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductConcentration extends Model
{
   protected $table = 'product_concentration';
    protected $fillable =
        [
            'id',
            'product_id',
            'concentration',
        ];


    



}
