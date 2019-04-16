<?php


namespace App\Http\Controllers\Admin;

use App\Model\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CountryRequest;

class CountriesController extends Controller
{
    public $path = "/assets/images/countries/";

    public function index()
    {
        $countries = Country::where('parent', '=', 0)
            ->orderBy('country_name', 'ASC')
            ->get();

        return view('admin.countries.index')
            ->with('pageTitle', 'Countries')
            ->with('countries', $countries);
    }

    public function create(Request $request)
    {
        $countries = Country::where('parent', '=', 0)->get();

        return view('admin.countries.create')
            ->with('pageTitle', 'Create New Country')
            ->with('countries', $countries);
    }

    public function store(CountryRequest $request)
    {
        $image_name = '';

        if ($request->has('country_image')) {
            $image = $request->file('country_image');
            $image_name = rand() . "_" . rand() . "_" . $image->getClientOriginalName();
            $upload_path = public_path() . $this->path;
            $image->move($upload_path, $image_name);
        }

        $newCountry = new Country();
        $newCountry->country_name = $request->country_name;
        $newCountry->code = $request->country_code;
        $newCountry->country_prefix = $this->slugify($request->country_name);
        $newCountry->logo = $image_name;
        $newCountry->parent = $request->main_country;

        if ($newCountry->save()) {
            return redirect()->route('countries.index')->with('status', 'added');
        }

        return redirect()->back()->with('status', 'error');
    }

    public function show($id)
    {
        $cities = Country::where('parent', '=', $id)->get();

        return view('admin.countries.cities')
            ->with('ID', $id)
            ->with('cities', $cities)
            ->with('pageTitle', Country::find($id)->first()->country_name . ' Citites');
    }


    public function edit($id)
    {
        $county = Country::findOrFail($id);
        $allCountries = Country::all();
        return view('admin.countries.edit')
            ->with('pageTitle', 'Edit ' . Country::find($id)->first()->country_name)
            ->with('allCountries', $allCountries)
            ->with('country', $county);
    }


    public function update(CountryRequest $request, $id)
    {
        $country = Country::findOrFail($id);

        $image_name = $request->oldImage;

        if ($request->has('country_image')) {
            if (File::exists(public_path() . $this->path . $country->logo)) {
                File::delete(public_path() . $this->path . $country->logo);
            }
            $image = $request->file('country_image');
            $image_name = rand() . "_" . rand() . "_" . $image->getClientOriginalName();
            $upload_path = public_path() . $this->path;
            $image->move($upload_path, $image_name);
        }

        try {
            $country->country_name = $request->country_name;
            $country->code = $request->country_code;
            $country->logo = $image_name;
            $country->parent = $request->main_country;
            $country->update();
            return redirect()->route('countries.index')->with('status', 'update');
        } catch (QueryException  $err) {
            return redirect()->back()->with('status', 'error');
        }
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $cities = Country::where('parent', $id);

        if (File::exists(public_path() . $this->path . $country->logo)) {
            File::delete(public_path() . $this->path . $country->logo);
        }

        if (count($cities->get()) > 0) {
            foreach ($cities->get() as $city) {
                if (File::exists(public_path() . $this->path . $city->logo)) {
                    File::delete(public_path() . $this->path . $city->logo);
                }
            }
            $cities->delete();
        }

        if ($country->delete()) {
            return redirect()->back()->with('status', 'delete');
        }
        return redirect()->back()->with('status', 'error');
    }
}
