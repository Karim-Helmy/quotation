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
        return view('users.consultant')->with('pageTitle', 'Quotation')->with('pageBanner', 'Quotation');
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
        $consultant->quotation_code = '#'.time().rand(1,9);

        $consultant->save();
        return redirect()->back()->with('message', 'Your quotation order has been successfully sent');
        }
    }
    public function view($id)
    {
        $quotation = DB::table('consultants')->find($id);
        DB::table('consultants')
            ->where('id', $id);
        //dd($quotation);
        return view('/users.viewquotation',compact('quotation'));
    }

    public function edit($id)
    {
        $quotation = DB::table('consultants')->find($id);
            DB::table('consultants')
                ->where('id', $id);
        return view('/users.edit',compact('quotation'));
    }
    public function destroy($id)
    {
        DB::table('consultants')->where('id', '=', $id)->delete();
        return redirect('/profile');
    }
    public function update(Request $request , $id){

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:11',
            'quotation_type' => 'required',
            'description' => 'required|string',
        ];

        $validator = validator::make($request->all(),$rules);
        $validator->SetAttributeNames ([
            ]);
            if($validator->fails())
            {
                return back()->withInput()->withErrors($validator);
            }
            else{
                DB::table('consultants')
                    ->where('id', $id)
                    ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'quotation_type' => $request->input('quotation_type'),
                    'message' => $request->input('description')
                    ]);

                return redirect()->route('edit', ['id' => $id]);
            }
    }
}
