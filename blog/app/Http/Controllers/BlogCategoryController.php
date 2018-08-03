<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin',['only' => ['create','edit']]);
    }


    public function index()
    {
        $categories = BlogCategory::orderBy('created_at', 'desc')->paginate(20);
        return view('Category.index', compact('categories'));
    }


    public function create()
    {   
        $categories = BlogCategory::latest()->get();
        return view('Category.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $rules = [
            'nameNl' => ['required', 'max:200', 'unique:blogcategories'],
            'nameEn' => ['required', 'max:200', 'unique:blogcategories'],
           ];
           
    
            $this->validate($request, $rules);


        $category = new BlogCategory;
        $category->nameNl = $request->nameNl;
        $category->nameEn = $request->nameEn;
        $category->save();
        Session::flash('flash_message', 'Category succefully created');
        
        return redirect('/categories');
    }

    public function show($id)
    {
    $category = BlogCategory::findOrFail($id);
    return view('Category.show', compact('category'));
    }


    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('Category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {

        $rules = [
            'nameNl' => ['required', 'max:200'],
            'nameEn' => ['required', 'max:200'],
           ];
           
    
            $this->validate($request, $rules);


        $category = BlogCategory::findOrFail($id);
        $category->update($request->all());
        Session::flash('flash_message', 'Category succefully edited');
        return redirect('/categories');
    }

        public function destroy($id)
        {
            $category = BlogCategory::findOrFail($id);
            $category->delete();
            Session::flash('flash_message', 'BlogCategory item succesfully deleted');
            return redirect('/categories');
        }
}
