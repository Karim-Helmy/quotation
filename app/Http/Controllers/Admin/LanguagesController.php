<?php

namespace App\Http\Controllers\Admin;

use App\Model\Languages;
use App\Model\Labels_Keys;
use App\Model\FaqCategories;
use App\Model\Labels_Values;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\LanguagesRequest;
use Illuminate\Database\QueryException;
use Psy\Exception\ErrorException;

class LanguagesController extends Controller
{
    public $path = "/assets/images/languages/";

    public function index()
    {
        $languages = Languages::all();
        return view('admin.languages.index')
            ->with('languages', $languages)
            ->with('pageTitle', 'Languages');
    }

    public function edit($id)
    {
        $language = Languages::where('id', $id)->firstOrFail();
        return view('admin.languages.edit')
            ->with('pageTitle', 'Edit ' . $language->language . ' Language')
            ->with('language', $language);;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'language_name' => 'required|string|max:255',
            'language_prefix' => 'required|string|max:255',
            'language_favicon' => 'image|mimes:jpeg,bmp,png,jpg|max:2048',
            'old_image' => 'required|string|max:255',
            'id' => 'required|numeric',
        ]);

        if ($request->has('language_favicon')) {
            if (File::exists(public_path() . $this->path . $request->old_image)) {
                File::delete(public_path() . $this->path . $request->old_image);
            }
            $image = $request->file('language_favicon');
            $image_name = rand() . "_" . rand() . "_" . $image->getClientOriginalName();
            $upload_path = public_path() . $this->path;
            $image->move($upload_path, $image_name);
        } else {
            $image_name = $request->old_image;
        }

        try {
            $language = Languages::where('id', $request->id)->first();
            $language->language = $request->language_name;
            $language->prefix = $request->language_prefix;
            $language->favicon = $image_name;
            $language->direction = $request->direction;
            $language->update();
            return redirect('/admin/languages')->with('status', 'update');
        } catch (QueryException $err) {
            return redirect()->back()->with('status', 'error');
        }
    }
    public function create()
    {
        return view('admin.languages.create')
            ->with('pageTitle', 'New Language');
    }

    public function store(LanguagesRequest $request)
    {

        $image = $request->file('language_favicon');
        $image_name = rand() . "_" . rand() . "_" . $image->getClientOriginalName();
        $upload_path = public_path() . $this->path;
        $image->move($upload_path, $image_name);

        $newLang = new Languages();
        $newLang->language = $request->language_name;
        $newLang->prefix = $request->prefix;
        $newLang->favicon = $image_name;
        $newLang->direction = $request->direction;

        if ($newLang->save()) {
            return redirect('/admin/languages')->with('status', 'added');
        }
        return redirect()->back()->with('status', 'error');
    }
    public function labels()
    {
        $labels = Labels_Keys::orderBy('id', 'ASC')->get();
        return view('admin.languages.labels.index')
            ->with('labels', $labels)
            ->with('pageTitle', 'Labels');
    }

    // public function createValues()
    // {

    // }

    // public function storeValues(Request $request)
    // {
    //     $this->validate($request, [
    //         'key_id' => 'required|numeric',
    //         'value' => 'required|string|max:255',
    //         'language' => 'required|numeric'
    //     ]);

    //     $check_if_value_exists = Labels_Values::where([
    //         ['key_id', '=', $request->key_id],
    //         ['language_id', '=', $request->language]
    //     ])
    //         ->get();

    //     if (count($check_if_value_exists) > 0) {
    //         return redirect()->back()->with('status', 'exists');
    //     }

    //     $newValue = new Labels_Values();
    //     $newValue->value = $request->value;
    //     $newValue->language_id = $request->language;
    //     $newValue->key_id = $request->key_id;

    //     if ($newValue->save()) {
    //         return redirect()->route('languages_labels')->with('status', 'added');
    //     }
    //     return redirect()->back()->with('status', 'error');
    // }

    public function createKey()
    {
        $labels = Labels_Keys::all();
        return view('admin.languages.labels.createkey')
            ->with('labels', $labels)
            ->with('pageTitle', 'Create Key');
    }

    public function storeKey(Request $request)
    {
        $this->validate($request, [
            'keyname' => "required|string|max:255"
        ]);

        try {
            $key = new Labels_Keys();
            $key->key = $this->PascalCase($request->keyname);
            $key->save();
            return redirect()->route('languages_labels')->with('status', 'added');
        } catch (QueryException $th) {
            return redirect()->back()->with('status', 'exists');
        }
    }

    public function editValue($id)
    {
        $value = Labels_Values::findOrFail($id);
        return view('admin.languages.labels.edit')
            ->with('value', $value)
            ->with('pageTitle', 'Edit Value');
    }

    public function updateValue(Request $request, $id)
    {
        $this->validate($request, [
            'value' => 'required|string|max:255'
        ]);
        $editValue = Labels_Values::find($id);
        $editValue->value = $request->value;
        if ($editValue->update()) {
            return redirect()->route('languages_labels')->with('status', 'update');
        }
        return redirect()->back()->with('status', 'error');
    }

    public function LanguageLabels($language_id)
    {
        $labels = Labels_Keys::orderBy('id', 'ASC')->get();
        $language = Languages::where('id', $language_id)->firstOrFail();
        return view('admin.languages.labels')
            ->with('pageTitle', $language->language . ' Labels')
            ->with('labels', $labels)
            ->with('language', $language);
    }

    public function storeLanguageLabel(Request $request, $language_id)
    {
        $labels = Labels_Keys::orderBy('id', 'ASC')->get();
        foreach ($labels as $label) {
            $this->validate($request, [
                $label->key => 'required|string|max:255',
            ]);
        };

        try {
            foreach ($labels as $label) {
                Labels_Values::updateOrCreate([
                    'key_id' => $label->id,
                    'language_id' => $language_id,
                ], [
                    'value' => $request->input($label->key)
                ]);
            }
            return redirect()->back()->with('status', 'update');
        } catch (ErrorException $e) {
            return redirect()->back()->with('status', 'error');
        }
    }

    // AJAX METHODS
    public function getCategories(Request $request)
    {
        $categories = FaqCategories::where('language_id', '=', $request->language_id)->get();
        return $categories;
    }

    public function Active(Request $request)
    {
        $language = Languages::where('id', '=', $request->language_id)->first();
        $language->status = 1;
        if ($language->update()) {
            return 'updated';
        }
        return 'error';
    }

    public function InActive(Request $request)
    {
        $language = Languages::where('id', '=', $request->language_id)->first();
        $language->status = 0;
        if ($language->update()) {
            return 'updated';
        }
        return 'error';
    }
}
