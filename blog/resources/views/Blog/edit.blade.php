@extends('Layouts.LayoutBack')
@section ('content')

<div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein">
        <div class="container">
            <div class="container-fluid">
                <h1 class=' mt-5'>{{__("Edit Blog")}}</h1>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">{{__("Are you certain?")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
                {!! Form::open(['method' => 'DELETE', 'action' => ['BlogController@destroy', $blog->id]]) !!} {!! Form::submit("Delete Blog", ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>

<main class="container ">

    
                {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id], 'files' =>true]) !!} @include('partials.errormessage')
    
                <div class="form-group">
    
                    {!! Form::label("blog_category_id", __("Category"))!!} {!! Form::select("blog_category_id[]", $blog_categories, null, ['id'
                    => 'tag_list','class'=> 'form-control']) !!}
    
    
                </div>
    
    
                <div class="form-group">
                    {!! Form::label("photo_id", __("Featured Image")) !!} {!! Form::file("photo_id",['class' => 'form-control']) !!}
    
                </div>
    
                {{-- //nl --}}
                <h3>{{__("Dutch")}}</h3>
                <div class="form-group">
                    {!! Form::label("titleNl", __("Title")) !!} {!! Form::text("titleNl", null, ['class' => 'form-control']) !!}
    
                </div>
    
                <div class="form-group">
                    {!! Form::label("bodyNl", __("Content")) !!} {!! Form::textarea("bodyNl", null, ['class' => 'form-control summer']) !!}
                </div>
    

    
    
                {{-- //en --}}
                <h3>{{__("English")}}</h3>
                <div class="form-group">
                    {!! Form::label("titleEn", __("Title")) !!} {!! Form::text("titleEn", null, ['class' => 'form-control']) !!}
    
                </div>
    
                <div class="form-group">
                    {!! Form::label("bodyEn", __("Content")) !!} {!! Form::textarea("bodyEn", null, ['class' => 'form-control summer']) !!}
                </div>


                
    
                <div class="form-group">
                    {!! Form::submit(__("Edit this blog"),['class' => 'btn btn-primary']) !!}
                </div>
    
    
                {!! Form::close() !!} 
    
    
                <div class="form-group">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                {{ __("Delete this blog")}}
                            </button>
                </div>
            </div>
    
    </main>
</main>
@endsection 

