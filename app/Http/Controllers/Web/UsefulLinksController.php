<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DiseaseCategories;
use App\Model\Vidoes;

class UsefulLinksController extends Controller
{
    public function doctors()
    {

    }

    public function vidoes()
    {
        $diseasesCategories = DiseaseCategories::all();
        return view('public.videos')
        ->with('diseasesCategories', $diseasesCategories)
        ->with('pageTitle', getLanguageValue('Videos'));
    }

    public function oneCategoryVideos($id)
    {
        $category = DiseaseCategories::where('prefix', $id)->firstOrFail();
        return view('public.video')
        ->with('videos', $category->getVidoes)
        ->with('pageBanner', getLanguageValue('Videos'))
        ->with('pageTitle', getLanguageValue('Videos'));
    }
}
