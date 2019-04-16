<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // return $this->getLang();
        return view('public.index')->with('pageTitle', 'Home');
    }
}
