<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\DiseaseCategories;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = DiseaseCategories::all();
        return view('admin.disease.index')
            ->with('diseases', $diseases)
            ->with('pageTitle', 'Disease');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.disease.create')
            ->with('pageTitle', 'Create Disease');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:255',
        ]);

        try {
            $diseasesCategory = new DiseaseCategories();
            $diseasesCategory->category = $request->category_name;
            $diseasesCategory->prefix = $this->slugify($request->category_name);
            $diseasesCategory->save();
            return redirect()->route('diseases-categories.index')->with('status', 'added');
        } catch (QueryException $err) {
            return redirect()->back()->with('status', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disease = DiseaseCategories::find($id);
        if ($disease->delete()) {
            return redirect()->back()->with('status', 'delete');
        }
        return redirect()->back()->with('status', 'error');
    }
}
