@if(Session::has('flash_message'))
<div class="alert alert-success">
  {{session::get('flash_message')}}
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&{{__("times")}}</button>
</div>
@endif 