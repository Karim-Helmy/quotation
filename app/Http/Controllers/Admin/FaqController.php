<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Model\Faq;
use App\Model\FaqCategories;
use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqCategoryRequest;

class FaqController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategories::orderBy('language_id', 'ASC')->get();
        return view('admin.faq.index')
            ->with('pageTitle', 'FAQ')
            ->with('faqsCategories', $faqCategories);
    }

    public function create()
    {
        $faqCategories = FaqCategories::all();
        return view('admin.faq.create')
            ->with('pageTitle', 'Create New FAQ')
            ->with('categories', $faqCategories);
    }

    public function store(FaqRequest $request)
    {
        $newFaq = new Faq();
        $newFaq->question = $request->f_label;
        $newFaq->answer = $request->an_label;
        $newFaq->category_id = $request->category;
        $newFaq->language_id = $request->language;
        $newFaq->slug = $request->f_label;
        if ($newFaq->save()) {
            return redirect('/admin/faq')->with('status', 'added');
        }
        return redirect()->back()->with('status', 'error');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $faq  = Faq::findOrFail($id);
        $faqCategories = FaqCategories::where('language_id', $faq->language_id)->get();
        return view('admin.faq.edit')
            ->with('pageTitle', 'Edit ' . $faq->question)
            ->with('categories', $faqCategories)
            ->with('faq', $faq);
    }

    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->question = $request->f_label;
        $faq->answer = $request->an_label;
        $faq->category_id = $request->category;
        $faq->slug = $request->f_label;

        if ($faq->update()) {
            return redirect('/admin/faq')->with('status', 'update');
        }
        return redirect()->back()->with('status', 'error');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        if ($faq->delete()) {
            return redirect()->back()->with('status', 'delete');
        }
        return redirect()->back()->with('status', 'error');
    }

    /* -- -- -- -- F A Q C A T E G O R I E S S T A R T S -- -- -- -- */

    public function createCategory()
    {
        return view('admin.faq.createCategory')
            ->with('pageTitle', 'Create FAQ Category');
    }

    public function storeCategory(FaqCategoryRequest $request)
    {
        $newCategory = new FaqCategories();
        $newCategory->category = $request->category_name;
        $newCategory->language_id = $request->language;
        if ($newCategory->save()) {
            return redirect('/admin/faq')->with('status', 'added');
        }
        return redirect()->back()->with('status', 'error');
    }

    public function editCategory($id)
    {
        $faqCategory = FaqCategories::findOrFail($id);
        return view('admin.faq.editCategory')
            ->with('category', $faqCategory)
            ->with('pageTitle', 'Edit ' . $faqCategory->category . ' Category :');
    }

    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:255',
        ]);

        $faqCategory = FaqCategories::find($id);
        $faqCategory->category = $request->category_name;
        if ($faqCategory->update()) {
            return redirect('/admin/faq')->with('status', 'update');
        }
        return redirect()->back()->with('status', 'error');
    }

    public function deleteCategory(Request $request)
    {
        $faqCategory = FaqCategories::findOrFail($request->id);
        $faqCategory->faq()->delete();
        if ($faqCategory->delete()) {
            return redirect()->back()->with('status', 'delete');
        }
        return redirect()->back()->with('status', 'error');
    }
}
