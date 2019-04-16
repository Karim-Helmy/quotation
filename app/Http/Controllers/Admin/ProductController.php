<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use App\Model\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules =
        [
            'en_main_name' => 'required',
            'ar_main_name' => 'required',
            'en_medical_name' => 'required',
            'ar_medical_name' => 'required',
            'en_other_name' => 'required',
            'ar_other_name' => 'required',
            'en_description' => 'required',
            'ar_description' => 'required',
        ];
        $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames
        ([
            'en_main_name' => trans('admin.en_main_name'),
            'ar_main_name' => trans('admin.ar_main_name'),
            'en_medical_name' => trans('admin.en_medical_name'),
            'ar_medical_name' => trans('admin.ar_medical_name'),
            'en_other_name' => trans('admin.en_other_name'),
            'ar_other_name' => trans('admin.ar_other_name'),
            'en_description' => trans('admin.en_description'),
            'ar_description' => trans('admin.ar_description'),
        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{
            $add = new Product;
            $add->save();
            }
return $add;




        }



 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         

           
    }










    public function destroy($id)
    {

    }

}
