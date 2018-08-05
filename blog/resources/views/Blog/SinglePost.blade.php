@extends('Layouts.LayoutFront')
@section ('content')


<div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein ">
        <div class="container">
            <div class="container-fluid">
              <h1 class=' mt-5'>{{$blog->titleNl}}</h1>
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


<main class="container">

   
                <div class="card mb-3">
                    <img class="card-img-top" src="/images/blog/{{$blog->photo ? $blog->photo->photo : ''}}" alt="">
                    <div class="card-body">
                

                    {{--  dutch  --}}
                    @if(LaravelLocalization::getCurrentLocale()=='nl')
                      <h3 class="card-title">{{$blog->titleNl}}</h3>
                      <p class="card-text">{!!$blog->bodyNl!!}</p>
                      @foreach($blog->category as $category)
                      <p class="card-text float-right mt-2"><small class="text-muted"><a class="card-text"href="{{ route('showblogCategory', $category->id) }}">{{$category->nameNl}}</a></small></p>
                      @endforeach
                      <p class="card-text float-left mt-2"><small class="text-muted">{{date('d-m-Y', strtotime($blog->created_at))}}</p></small>
                      @endif 
                    
                        

                  
                    {{--  eng  --}}
                    @if(LaravelLocalization::getCurrentLocale()=='en')
                      <h3 class="card-title">{{$blog->titleEn}}</h3>
                      <p class="card-text">{!!$blog->bodyEn!!}</p>
                      @foreach($blog->category as $category)
                      <p class="card-text float-right mt-2"><small class="text-muted"><a class="card-text"href="{{ route('showblogCategory', $category->id) }}">{{$category->nameNl}}</a></small></p>
                      @endforeach
                      <p class="card-text float-left mt-2"><small class="text-muted">{{date('d-m-Y', strtotime($blog->created_at))}}</p></small>
                      @endif 

                      {{--  buttons  --}}
                      
                    @if(Auth::user()->role_id==1)
                    <hr>
                        <br>
                        <br>
                      <div class="card-footer">
                        
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                  {{ __("Delete this blog")}}
                              </button>
                      
                      <a href="{{ route("editblog", ['id' => $blog->id]) }}" class="btn btn-primary float_right">{{__("Edit this blog")}}</a>
                    </div>
                    @endif
                    
                    @if(Auth::user()->role_id==2)
              
                        @if(Auth::user()->id==$blog->user_id)
                        <hr>
                        <br>
                        <br>
                          <div class="card-footer">
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                      {{ __("Delete this blog")}}
                                  </button>
                          </div>
                          <a href="{{ route("editblog", ['id' => $blog->id]) }}" class="btn btn-primary float_right">{{__("Edit this blog")}}</a>
                        </div>
                        @endif
                    @endif




                    </div>
                  </div>
                  {{--  display comment  --}}
                  <section class="mt-5 card" id="comment">
                  @foreach ($blog->comments as $comment)
                  <article>
                        <h2>{{__("Comments")}}</h2>
                    {{date('d-m-Y', strtotime($blog->created_at))}}
                    @if(LaravelLocalization::getCurrentLocale()=='nl')
                    
                    <h3>{{$comment->bodyNl}}</h3>
                    <br>
                    <hr>


                    @endif

                    @if(LaravelLocalization::getCurrentLocale()=='en')
              
                    <h3>{{$comment->bodyEn}}</h3>
                    br
                    <hr>
                    @endif

                  </article>
                  @endforeach
                </section>
                 <br>
                 <br>

                {{--  comment form  --}}
                <div class="card">
                    {!! Form::open(['method' => 'Post', 'action' => ['CommentsController@store', $blog->id]]) !!}
                    @include('partials.errormessage')
                    <h3>{{__("Comment")}}</h3>
                    <div class="form-group">
                    @if(LaravelLocalization::getCurrentLocale()=='nl')
                    {!! Form::label("bodyNl",  __("Content")) !!}
                    {!! Form::textarea("bodyNl", null, ['class' => 'form-control']) !!}
                    @endif
                    </div>
                   
                    <div class="form-group">
                    @if(LaravelLocalization::getCurrentLocale()=='en')
                    {!! Form::label("bodyEn",  __("Content")) !!}
                    {!! Form::textarea("bodyEn", null, ['class' => 'form-control']) !!}
                    @endif
                  </div>

                    <div class="form-group">
                     {!! Form::submit(__("Add this comment"),['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
               
                {!! Form::close() !!}
</main>
@endsection 










