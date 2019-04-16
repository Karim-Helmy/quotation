<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Consultants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Whoops\Exception\ErrorException;

class ConsultantsController extends Controller
{
    public function index()
    {
        $consultants = Consultants::all();
        return view('admin.consultant.index')
            ->with('consultants', $consultants)
            ->with('pageTitle', 'Consultants');
    }

    public function show($id)
    {
        $consultant = Consultants::findOrFail($id);
        $doctors = User::where('level', '=', 'doctor')->get();
        return view('admin.consultant.show')
            ->with('consultant', $consultant)
            ->with('doctors', $doctors)
            ->with('pageTitle', $consultant->firstname_booking . ' Consultant');
    }

    public function assign(Request $request)
    {
        $this->validate($request, [
            'doctorId' => 'required|string',
            'consultant_id' => 'required|string',
            'message' => 'required|string'
        ]);

        // Additional Security

        $getConsultant = Consultants::where('consultant_id', $request->consultant_id)->firstOrFail();


        $check_Consultant = DB::select('select * from consultants__doctors where consultant_id = :consultant_id and doctor_id = :doctor_id', [
            'consultant_id' => strval($getConsultant->id),
            'doctor_id' => strval($request->doctorId)
        ]);


        if (count($check_Consultant) >= 1) {
            return 'exists';
        }

        $consultant = Consultants::where('consultant_id', $request->consultant_id)->first();

        try {
            DB::table('consultants__doctors')->insert(
                [
                    'consultant_id' =>  $consultant->id,
                    'doctor_id' => $request->doctorId,
                    'message' =>  $request->message,
                ]
            );

            DB::table('consultants')
                ->where('consultant_id', $request->consultant_id)
                ->update([
                    'status' => 1
                ]);

            return 'done';
        } catch (ErrorException $th) {
            return 'error';
        }
    }
}
