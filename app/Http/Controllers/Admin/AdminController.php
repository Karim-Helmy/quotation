<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    public function index()
    {

        return view('/admin.index')
            ->with('pageTitle', 'Dashboard');
    }
    public function show()
    {
        $quotations = DB::table('consultants')->get();

        return view ('/admin.index',compact('quotations'));

    }

    public function showquotation ($id){
        $quotation = DB::table('consultants')->find($id);
        DB::table('consultants')
            ->where('id', $id)
            ->update(['seen' => 1]);
        //dd($quotation);
        return view('/admin.consultant.showquotation',compact('quotation'));
        //return redirect()-> Route('ShowQuotation',$quotation->id);
    }

    public function destroy($id){
        //
        DB::table('consultants')->where('id', '=', $id)->delete();
        return redirect('/admin');
    }

    public function forward($id){
        DB::table('consultants')
            ->where('id', $id)
            ->update(['forward' => 1]);
            return redirect('/admin');
    }
}
