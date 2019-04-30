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

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }
    public function create()
    {
    }

    public function store(LanguagesRequest $request)
    {
    }
    public function labels()
    {
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
    }

    public function storeKey(Request $request)
    {
    }

    public function editValue($id)
    {
    }

    public function updateValue(Request $request, $id)
    {

    }

    public function LanguageLabels($language_id)
    {

    }

    public function storeLanguageLabel(Request $request, $language_id)
    {

    }

    // AJAX METHODS
    public function getCategories(Request $request)
    {

    }

    public function Active(Request $request)
    {

    }

    public function InActive(Request $request)
    {

    }
}
