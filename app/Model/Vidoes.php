<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vidoes extends Model
{
    public function getCategory()
    {
        return $this->belongsToMany('App\Model\DiseaseCategories', 'videos_categories', 'vidoe_id', 'category_id');
    }

}
