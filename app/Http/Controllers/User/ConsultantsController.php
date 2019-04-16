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

class ConsultantsController extends Controller
{
    public $path = "/assets/images/consultants";

    public function index()
    {
        return view('users.consultants')->with('pageTitle', 'Consultant')->with('pageBanner', 'Consultant');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname_booking' => 'required|string|max:255',
            'lastname_booking' => 'required|string|max:255',
            'email_booking' => 'required|email',
            'telephone_booking' => 'required|numeric',
            'message' => 'required|string|max:2000',
            'files.*' => 'mimes:jpeg,bmp,png,pdf|max:5012',
        ]);

        try {

            $consultant = new Consultants();
            $consultant->consultant_id = random_int(1, 3) . "-" . rand();
            $consultant->firstname_booking = $request->firstname_booking;
            $consultant->lastname_booking = $request->lastname_booking;
            $consultant->email_booking = $request->email_booking;
            $consultant->phone = $request->telephone_booking;
            $consultant->message = $request->message;
            $consultant->save();

            foreach ($request->file('files') as $singleFile) {
                $image = $singleFile;
                $image_name = rand() . "_" . rand() . "_" . $image->getClientOriginalName();
                $upload_path = public_path() . $this->path;
                $image->move($upload_path, $image_name);
                $newImage = new Consultants_Images();
                $newImage->images = $image_name;
                $consultant->get_images()->save($newImage);
            }
            return redirect()->route('successRoute')
                ->with('status', 'success')
                ->with('email', $request->email_booking)
                ->with('username', $request->firstname_booking . " " . $request->lastname_booking);
        } catch (ErrorException $err) {
            return redirect('/');
        }
    }

    public function show($id)
    {
        $consultant = Consultants::where('consultant_id', $id)->firstOrFail();

        if (!$consultant->doctors->contains(Auth::user()->id)) {
            return abort(403);
        }

        return view('users.oneConsultant')
            ->with('pageTitle', 'Consultant #ID ' . $id)
            ->with('pageBanner', 'Consultant #ID ' . $id)
            ->with('consultant', $consultant);
    }

    public function Replay(Request $request, $id)
    {
        $this->validate($request, [
            'replay' => 'required|string|max:1000'
        ]);

        try {
            DB::table('consultants__doctors__replay')->insert([
                'doctor_id' => Auth::user()->id,
                'consultant_id' => $id,
                'replay' => $request->replay
            ]);
            return redirect()->route('successRoute')->with('status', 'success');
        } catch (QueryException $th) {
            return redirect()->route('profile.myProfile')->withErrors([
                'error' => "An Error Occured Please Try Again Later"
            ]);
        }
    }
}
