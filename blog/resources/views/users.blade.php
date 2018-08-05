@extends('layouts.LayoutBack') @section ('content')



<div class="jumbotron .jumbotron-fluid prideBlue scene_element scene_element--fadein">
    <div class="container">
        <div class="container-fluid">
            <h1 class=' mt-5'>{{__("Users")}}</h1>
        </div>
    </div>
</div>
<main class="container m-page scene_element scene_element--fadeinup">

    <div class="container-fluid">



        <div class="col-sm col-sm-offset-2">

            <article>
                <div class="table-responsive">
                    <table class="table spaceUnder table-sthiped" >
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Joined')}}</th>
                                

                            </tr>
                        </thead>

                        <tbody class="align-items-center">


                            @foreach ($users as $user)
                            <tr class="fake-card rounded">
                                {{--  <p>{{$user->id}}</p>  --}}
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>

                            </div>
                </div>

                </tr>
                @endforeach

                </tbody>
                </table>
        </div>
        {{--
        <div class="met-3 mb-3">
            <ul class="list-group">

                @foreach($events as $events ) @foreach ($events->likes as $user)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="btn" href="events/{{ $events->id }}">{{ $events->titleNl }}</a>

                    <span class=" badge-pill float_right">
                        @if ($events->isLiked)
                        <a class="prideOrange btn" href="{{ route('events.like', $events->id) }}">{{_('Remove from agenda')}}</a>
                        @else
                        <a class="prideOrange btn" href="{{ route('events.like', $events->id) }}">{{_('Add to my agenda')}}</a>
                        @endif
                    </span>
                </div>
                @endforeach @endforeach


            </ul>
        </div> --}}
        </article>



    </div>
    </div>

</main>


@endsection