


<!-- Side navigation -->
<div class="sidenav">
<div class="mt-4 pt-4 mb-4 pb-4"></div>
@if(Auth::user()->role_id==1)
<a href="{{url('/users')}}" class="btn btn-secondary mijnProg" role="button">{{__("See all users")}}</a> 
<hr>
<a href="{{url('/users')}}" class="btn btn-secondary mijnProg" role="button">{{__("See deleted blogs")}}</a> 
<hr>
<a href="{{ route('createblogCategory') }}" class="btn mb-1 btn-secondary mijnProg" role="button">{{__("Add a categorie")}}</a>
<hr>
@endif
<a href="{{ route('createblog') }}" class="btn btn-secondary mijnProg" role="button">{{__("Add blog")}}</a>
<hr>

</div>

<!-- Page content -->
<div class="main">
  ...
</div> 