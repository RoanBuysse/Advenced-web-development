@extends('Layouts.LayoutFront')
@section ('content')


<div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein ">
        <div class="container">
            <div class="container-fluid">
              <h1 class=' mt-5'>{{$blog->titleNl}}</h1>
            </div>    
            </div>    
</div>

<main class="container scene_element scene_element--fadeinup">

   
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
                      <p class="card-text float-left mt-2"><small class="text-muted">{{date('d-m-Y', strtotime($blog->created_at))}}</p>
                      @endif 
                    
                        

                  
                    {{--  dutch  --}}
                    @if(LaravelLocalization::getCurrentLocale()=='en')
                      <h3 class="card-title">{{$blog->titleEn}}</h3>
                      <p class="card-text">{!!$blog->bodyEn!!}/p>
                      @foreach($blog->category as $category)
                      <p class="card-text float-right mt-2"><small class="text-muted"><a class="card-text"href="{{ route('showblogCategory', $category->id) }}">{{$category->nameNl}}</a></small></p>
                      @endforeach
                      <p class="card-text float-left mt-2"><small class="text-muted">{{date('d-m-Y', strtotime($blog->created_at))}}</p>
                      @endif 
                    




                    </div>
                  </div>
                  {{--  display comment  --}}
                  <section class="mt-5 card" id="comment">
                  @foreach ($blog->comments as $comment)
                  <article>

                    {{date('d-m-Y', strtotime($blog->created_at))}}
                    @if(LaravelLocalization::getCurrentLocale()=='nl')
                    {{$comment->bodyNl}}
                    @endif

                    @if(LaravelLocalization::getCurrentLocale()=='en')
                    {{$comment->bodyEn}}
                    @endif

                  </article>
                  @endforeach
                </section>
                 

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










