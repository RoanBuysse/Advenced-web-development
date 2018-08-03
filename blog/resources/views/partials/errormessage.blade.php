<div class="alert alert-danger">
    @if(count($errors))
        @foreach($errors->all() as $error)
        <li style="list_style-type:none;">{{$error}}</li>
        @endforeach

    @endif
    </div>