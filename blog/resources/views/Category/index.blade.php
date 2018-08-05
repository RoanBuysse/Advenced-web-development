@extends('layouts.LayoutFront') @section ('content')


<div class="jumbotron .jumbotron-fluid prideBlue">
    <div class="container">
        <div class="container-fluid">
            <h1 class=' mt-5'>{{__("Categories")}}</h1>
        </div>
    </div>
</div>

<main class="container m-page">

  

    
            @include('partials.flashmessage')

          
            <article>
                    <div class="mt-3 mb-3">
                        <a class="" href="{{ route("createblogCategory") }}"> {{__("Add new category")}}</a>
                        @foreach($categories as $i  => $category)
                        
                        <ul class="list-group mb-3">
                            <div>
                                    <div type="button" data-toggle="collapse" data-target="#collapse{{$i}}" class="btn list-group-item d-flex justify-content-between align-items-center" aria-expanded="false" aria-controls="collapseExample">
                                        {{--  NL  --}}
                                        @if(LaravelLocalization::getCurrentLocale()=='nl')
                                        <strong>{{$category->nameNl}}</strong>
                                        @endif

                                         {{--  En  --}}
                                         @if(LaravelLocalization::getCurrentLocale()=='en')
                                         <strong>{{$category->nameNl}}</strong>
                                         @endif


                                            <span class=" badge-pill float_right">
                             
                                            <span class="badge badge-primary badge-pill float_right">{{$category->blog->count()}}</span>
                                
                                            <a class="btn btn-primary float_right" href="{{ route("editblogCategory", ['id' => $category->id]) }}"> {{__("Edit this category")}}</a>
                                            </span>
                                    </div>
                                
                            </div>
                            @foreach($category->blog as $blog)
                            
                                   
                                    <div>
                                            <div id="collapse{{$i}}" class="list-group collapse">
                                            <a   href="{{ route("showblog", ['id' => $blog->id]) }}" class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">
                                             {{--  Nl  --}}
                                        
                                         @if(LaravelLocalization::getCurrentLocale()=='nl')
                                         <strong>{{$blog->titleNl}}</strong>
                                         @endif

                                             {{--  En  --}}
                                        
                                             @if(LaravelLocalization::getCurrentLocale()=='en')
                                             <strong>{{$blog->titleEn}}</strong>
                                             @endif
                                               
                                                    <span class=" badge-pill float_right">
                                                    <a href="{{ route("editblog", ['id' => $blog->id]) }}" class="btn btn-primary float_right">{{__("Edit this blog")}}</a>
                                                    </span>
                                            </a>
                                    </div>
                                   
                            </div>
                            @endforeach
                        </ul>
                        @endforeach

            
                </article>
        




    

    @endsection