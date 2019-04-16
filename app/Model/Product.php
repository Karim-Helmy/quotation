<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'product';
    protected $fillable =
        [
            'id',
            'user_id',
            'user_type',
        ];
   public function product_to_product_attributes()
    {

        return $this->hasMany('App\Model\ProductAttributes', 'product_id', 'id');

    }
    public function product_to_products_faq()
    {

        return $this->hasMany('App\Model\ProductFaq', 'product_id', 'id');

    }

    public function product_to_product_concentration()
    {

        return $this->hasMany('App\Model\ProductConcentration', 'product_id', 'id');

    }




}
