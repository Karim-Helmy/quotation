<?php

namespace App\Http\Controllers\Web;

use App\Model\Labels_Keys;
use App\Model\FaqCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $language_id = $this->getLangID();
        $faqs = FaqCategories::where('language_id', '=', $language_id)->get();
        return view('public.faq')
        ->with('pageBanner', 'Faq')
        ->with('faqs', $faqs)
        ->with('pageTitle', 'FAQ | سؤال وجواب');
    }
}
