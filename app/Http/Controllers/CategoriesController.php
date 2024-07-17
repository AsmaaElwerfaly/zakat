<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;


class CategoriesController extends Controller
{

    public function index()
    {

        $categorie = categorie::latest()->get();
        return view('categories', compact('categorie'));
    }


    public function create()
    {
        //
    }


    public function store(CategoriesRequest $request)
    {

        categorie::create([
            'name_category' => $request->name_category,

        ]);
        session()->flash('Add', 'تم اضافة البيانات بنجاح ');
        return redirect('/categories');
    }


    public function show(categorie $categories)
    {
        //
    }


    public function edit(categorie $categories)
    {
        //
    }


    public function update(CategoriesRequest $request, categorie $categories)
    {

        $input = categorie::findOrFail($request->id);
        $input->name_category = $request->name_category;
        $input->save();



        session()->flash('edit', 'تم تعديل البيانات بنجاج');
        return redirect('/categories');
    }


    public function destroy(Request $request, categorie $categories)
    {
        categorie::findOrFail($request->id)->delete();

        $categories->delete();
        session()->flash('delete', 'تم حذف البيانات بنجاج');
        return redirect('/categories');
    }
}
