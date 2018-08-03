@extends('layouts.LayoutBack')
@section ('content')


<div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein">
        <div class="container">
            <div class="container-fluid">
            <h1 class=' mt-5'>{{__("Create category")}}</h1>
            </div>    
            </div>    
    </div>

<main class="container m-page scene_element scene_element--fadeinup">

    

        
{!! Form::open(['method' => 'Post', 'action' => 'BlogCategoryController@store']) !!}
@include('partials.errormessage')
{{--  //nl  --}}
<h3>{{__("Dutch")}}</h3>
<div class="form-group">
    {!! Form::label("nameNl", __("Name")) !!}
    {!! Form::text("nameNl", null, ['class' => 'form-control']) !!}
   
</div>



{{--  //en  --}}
<h3>{{__("English")}}</h3>
<div class="form-group">
    {!! Form::label("nameEn",  __("Name")) !!}
    {!! Form::text("nameEn", null, ['class' => 'form-control']) !!}
   
</div>



<div class="form-group">
        {!! Form::submit(__("Create a category"),['class' => 'btn btn-primary']) !!}
</div>

    
{!! Form::close() !!}

</main>
@endsection 
