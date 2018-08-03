@extends('Layouts.LayoutBack')
@section ('content')



<div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein">
        <div class="container">
            <div class="container-fluid">
              <h1 class=' mt-5'>{{__("Blog")}}</h1>
            </div>    
            </div>    
      </div>

<main class="container ">

  


        {!! Form::open(['method' => 'Post', 'action' => 'BlogController@store', 'files'=>true]) !!}
        
        @include('partials.errormessage')
        
        <div class="form-group">
            
            {!! Form::label("blogs_category_id", __("Category"))!!}
            
            {!! Form::select("blogs_category_id[]", $blog_categories, null, ['id' => 'tag_list','class'=> 'form-control']) !!}

        </div>


        <div class="form-group">
            {!! Form::label("photo_id",  __("Featured Image")) !!}
            {!! Form::file("photo_id",['class' => 'form-control']) !!}
           
        </div>
        
        {{--  //nl  --}}
        <h3>{{__("Dutch")}}</h3>
        <div class="form-group">
            {!! Form::label("titleNl", __("Title")) !!}
            {!! Form::text("titleNl", null, ['class' => 'form-control']) !!}
           
        </div>

        <div class="form-group">
                {!! Form::label("bodyNl",  __("Content")) !!}
                {!! Form::textarea("bodyNl", null, ['class' => 'form-control summer']) !!}
        </div>

        
        {{--  //en  --}}
        <h3>{{__("English")}}</h3>
        <div class="form-group">
        {!! Form::label("titleEn", __("Title")) !!}
        {!! Form::text("titleEn", null, ['class' => 'form-control']) !!}
        
        </div>

        <div class="form-group">
            {!! Form::label("bodyEn", __("Content")) !!}
            {!! Form::textarea("bodyEn", null, ['class' => 'form-control summer']) !!}
        </div>

        <div class="form-group">
                {!! Form::submit(__("Create this blog item"),['class' => 'btn btn-primary']) !!}
        </div>
      
            
        {!! Form::close() !!}
  

</main>
@endsection 


