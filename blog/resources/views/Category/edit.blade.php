@extends('layouts.LayoutBack')
@section ('content')

            <div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein">
                    <div class="container">
                        <div class="container-fluid">
                        <h1 class=' mt-5'>{{__("Edit category")}}</h1>
                        </div>    
                        </div>    
                </div>


                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal">{{_("Are you certain?")}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
                                {!! Form::open(['method' => 'Delete','action'=> ['BlogCategoryController@destroy', $category->id]]) !!}
        
                                {!! Form::submit(__("Delete categorie"),['class'=> 'btn btn-danger'] ) !!}
                                
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            
                



            <main class="container m-page scene_element scene_element--fadeinup">

           

                
        {!! Form::model($category,['method' => 'PATCH', 'action' => ['BlogCategoryController@update', $category->id]]) !!}
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
            {!! Form::label("nameEn", __("Name")) !!}
            {!! Form::text("nameEn", null, ['class' => 'form-control']) !!}
           
        </div>

        <div class="form-group">
                {!! Form::submit(__("Edit categorie"),['class' => 'btn btn-primary']) !!}
        </div>
      
            
      
            
        {!! Form::close() !!}
        


        <div class="form-group">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                        {{ __("Delete category")}}
                    </button>
        </div>
       
    


</main>
@endsection 
