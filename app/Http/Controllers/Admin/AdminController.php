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
        $quotations = DB::table('consultants')->paginate(20);

        return view ('/admin.index',compact('quotations'));

    }

    public function acceptedqauotations()
    {
        $quotations = DB::table('consultants')->where('approval' , '=' , '1')->paginate(20);
        //dd($quotations);
        return view ('/admin.accepted_quotations',compact('quotations'));
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
