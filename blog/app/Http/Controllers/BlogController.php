<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\BlogCategory;
use App\Photo;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogController extends Controller
{
    public function __construct()
    {
      $this->middleware('isSubscriber',['only' => ['create','edit']]);
    }

    public function index(Request $request)
    {
        $blog = Blog::orderBy('created_at', 'desc')->paginate(20);
        return view('index', compact('blog'));
        
    }

    public function create()
    { 
        if(LaravelLocalization::getCurrentLocale()=='nl')
        { $blogcategories  = BlogCategory::pluck('nameNl','id');
         
        }
        if(LaravelLocalization::getCurrentLocale()=='en')
        { $blogcategories = BlogCategory::pluck('nameEn','id');
         
        }
        return view('Blog.create', compact('blogcategories'));
    }
        
    

    public function store(Request $request)
    {
       $rules = [
        'titleNl' => ['required', 'min:5', 'max:200'],
        'titleEn' => ['required', 'min:5', 'max:200'],

        'photo_id' => ['required', 'mimes:jpeg,jpg,png', 'max:6000'],

        'bodyNl' => ['required', 'min:10'],
        'bodyEn' => ['required', 'min:10'],

       ];
       
       $message =[
        'photo_id.mimes' => 'Your image must be jpeg, jpg or png',
        'photo_id.max' => 'Your image can be no larger than 6mb',
        ];

       $this->validate($request, $rules);
       
       $input = $request->all();
       if ($file = $request->file('photo_id')) {
        $name = $file->getClientOriginalName();
        $file->move('/images/blog', $name);
        $photo = Photo::create(['photo' => $name, 'title' => $name]);
        $input['photo_id'] = $photo->id;
    }



       $blog = Blog::create($input);
       
        if ($categoryIds = $request->blogs_category_id){
            $blog->category()->sync($categoryIds);
        }

       
       Session::flash('flash_message', 'Blog item succesfully created');
       
       return redirect('/admin');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Blog.SinglePost.blade', compact('blog'));
      
        
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        if(LaravelLocalization::getCurrentLocale()=='nl')
        { $blogcategories  = BlogCategory::pluck('nameNl','id');
         
        }
     
        if(LaravelLocalization::getCurrentLocale()=='en')
        { $blogcategories  = BlogCategory::pluck('nameEn','id');
       
        }
        
        
        return view('Blog.edit', compact('blog', 'blogcategories'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'titleNl' => ['required', 'min:5', 'max:200'],
            'titleEn' => ['required', 'min:5', 'max:200'],
    
            'photo_id' => ['mimes:jpeg,jpg,png', 'max:6000'],
    
            'bodyNl' => ['required', 'min:10'],
            'bodyEn' => ['required', 'min:10'],
    
           ];
           
           $message =[
            'photo_id.mimes' => 'Your image must be jpeg, jpg or png',
            'photo_id.max' => 'Your image can be no larger than 6mb',
            ];

            $this->validate($request, $rules);


        $input = $request->all();
        $blog = Blog::findOrFail($id);

        if ($file = $request->file('photo_id')) {

            if($blog->photo){
                unlink('/images/blog/'.$blog->photo->photo);
                $blog->photo()->delete('photo');
            }
            $name = $file->getClientOriginalName();
            $file->move('/images/blog', $name);
            $photo = Photo::create(['photo' => $name, 'title' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $blog->update($input);
        if ($categoryIds = $request->blogs_category_id){
            $blog->category()->sync($categoryIds);
        }
        Session::flash('flash_message', 'Blog item succesfully updated');

        return redirect('/admin');
       
        
    }


    public function destroy(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete($request->all());
        $categoryIds = $request->blogs_category_id;
        $blog->category()->detach($categoryIds);
        if($blog->photo){
            unlink('/images/blog/'.$blog->photo->photo);
            $blog->photo()->delete('photo');
        }
        Session::flash('flash_message', 'Blog item succesfully deleted');
        return redirect('/');
    }

}