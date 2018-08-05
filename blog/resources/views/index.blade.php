@extends('layouts.LayoutFront') @section ('content')

{{--  dutch  --}}


 
{{--  <div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein">
        <div class="container">
           
                    @if(LaravelLocalization::getCurrentLocale()=='nl')
                    <h1 class=' mt-5'>{{__("Blogs in category:")}} {{$category->nameNl}}</h1>
                    @endif

                     @if(LaravelLocalization::getCurrentLocale()=='en')
                     <h1 class=' mt-5'>{{__("Blogs in category:")}} {{$category->nameEn}}</h1>
                     @endif 
                    
       
            </div>    
      </div>  --}}
      
<main class="container m-page scene_element scene_element--fadeinup">

   

    <article class="row result">
            <div class="card-columns col-sm">
                    @foreach($blog as $blogs)
                    <div class="card" style="width: 18rem; margin-bottom: 3rem;">
                       
                            {{--  <img class="card-img-top" v-bind:src="'/images/news/' + news.photo.photo" alt="news photo"/>  --}}
                       
                      
                            <div class="card-body">
                                @if(LaravelLocalization::getCurrentLocale()=='nl')
                                <h4 class="card-title">{{$blog->titleNl}}</h4>
                                 
                                <p class="card-text mt-4" style="min-height: 50px;">{!!$blog->bodyNl!!}</p>
                                <a class="btn btn pridePurple"  href="{{ route('showblog', $blog->id) }}">{{__("Read More")}}</a>
                                @endif

                                @if(LaravelLocalization::getCurrentLocale()=='en')
                                <h4 class="card-title">{{$blog->titleEn}}</h4>
                                 
                                <p class="card-text mt-4" style="min-height: 50px;">{!!$blog->bodyEn!!}</p>
                                <a class="btn"  href="{{ route('showblog', $blog->id) }}">{{__("Read More")}}</a>
                                @endif
                               
                            </div>

                        <div class="card-footer text-muted">
                           
                           <h6 class="card-text text-muted align-right">{{__("Added on:")}} {{date('d-m-Y', strtotime($blog->created_at))}}</h6>
                        </div>
                        
                    </div>
                    @endforeach
                </div>   
    </article>
        
     


</main>

@endsection 
