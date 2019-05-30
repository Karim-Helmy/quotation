<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Validator;
class superadmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = DB::table('consultants')->where('forward', '=' ,'1')->paginate(20);
        //dd($quotations);
        return view('/super_admin/index',compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = DB::table('consultants')->find($id);
        DB::table('consultants')
            ->where('id', $id)
            ->update(['seen' => 1]);
        //dd($quotation);
        return view('/super_admin.showquotation',compact('quotation'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =[
            'mcost'=>'required|min:1|max:7',
            'tcost'=>'required|min:1|max:7',
            'duration'=>'required|numeric',
            'lang'=>'required'
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
                    'monthly_cost' => $request->input('mcost'),
                    'total_cost' => $request->input('tcost'),
                    'Compeletion_duration' => $request->input('duration'),
                    'language' => $request->input('lang'),
                    'feedback' => $request->input('feedback'),
                    'approval'=>'1'
                    ]);
                return redirect('/superadmin');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('consultants')->where('id', '=', $id)->delete();
        return redirect('/superadmin');
    }
    public function calculate($id){
       // dd($id);
        $quotation = DB::table('consultants')->where('id', '=', $id)->get();
        return view('super_admin.calculate',compact('quotation'));
    }
    public function recalculateview($id){
        $quotation = DB::table('consultants')->where('id', '=', $id)->get();
        return view('super_admin.recalculate',compact('quotation'));
    }
    public function recalculate(Request $request , $id){
        $rules =[
            'mcost'=>'required|min:1|max:7',
            'tcost'=>'required|min:1|max:7',
            'duration'=>'required|numeric',
            'lang'=>'required'

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
                    'monthly_cost' => $request->input('mcost'),
                    'total_cost' => $request->input('tcost'),
                    'Compeletion_duration' => $request->input('duration'),
                    'language' => $request->input('lang'),
                    'feedback' => $request->input('feedback'),
                    'approval'=>'1'
                    ]);

                return redirect()->route('showquotation', ['id' => $id]);
            }
    }

    public function reject($id){
        DB::table('consultants')->where('id',$id)
        ->update([
            'approval'=>'0'
        ]);
        return back();
    }
    public function approve($id){
        DB::table('consultants')->where('id',$id)
        ->update([
            'approval'=>'1'
        ]);
        return back();
    }
}
