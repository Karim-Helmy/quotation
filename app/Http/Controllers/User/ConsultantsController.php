<?php

namespace App\Http\Controllers\User;

use App\Model\Consultants;
use Illuminate\Http\Request;
use App\Model\Consultants_Images;
use Psy\Exception\ErrorException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Validator;

class ConsultantsController extends Controller
{
    public $path = "/assets/images/consultants";

    public function index()
    {
        return view('users.consultant')->with('pageTitle', 'Consultant')->with('pageBanner', 'Consultant');
    }
    public function store(Request $request)
    {
      $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:11',
            'quotation_type' => 'required',
            'description' => 'required|string',
        ];
   $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }
        else{
        $consultant = new Consultants();
        $consultant->user_id = Auth::user()->id;
        $consultant->name = $request->input('name');
        $consultant->email = $request->input('email');
        $consultant->phone = $request->input('phone');
        $consultant->quotation_type = $request->input('quotation_type');
        $consultant->message = $request->input('description');

        $consultant->save();
        return redirect('/');
        }

    }





}
