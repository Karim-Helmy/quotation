<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DiseaseCategories extends Model
{
    public function getVidoes()
    {
        return $this->belongsToMany('App\Model\Vidoes', 'videos_categories', 'category_id', 'vidoe_id');
    }
}
