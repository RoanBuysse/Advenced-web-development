<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
          
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                
    
                    <a class="nav-link" href="{{ url('/') }}">{{__("Home")}}
    
                    <!-- Authentication Links -->
                    @guest
    
                  
    
                      
    
                            <a class="nav-link" href="{{ route("login") }}"> {{__("Log in")}}</a>
                            <a class="nav-link" href="{{ route("register") }}">{{__("Register")}}</a>
                          

               
                    @else
    
                   
                        <a  class="nav-link" href="{{URL::to('/')}}/{{LaravelLocalization::getCurrentLocale()}}/likes')">{{__("My liked items")}}</a>
                    
                
                    @if(Auth::user()->role_id==1)
                    <a class="nav-link" href="{{ route("about") }}"> {{__("About")}}</a>
                    <li class="btn user dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                            <span class="caret"></span>
                        </a>
    
                        <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
    
                            <a class="dropdown-item" href="{{ route('dashboard') }}">{{__("Dashboard")}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif

                    @if(Auth::user()->role_id==2)

                    <a class="nav-link" href="{{ route("about") }}"> {{__("About")}}</a>

                    <li class="btn user dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                            <span class="caret"></span>
                        </a>
                        
                        <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
    
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif
                    @endguest
    
               
    
    
    
                <!-- Right Side Of Navbar -->
    
                <ul class="navbar-nav ml-auto">
    
    
    
    
                        <li class="btn dropdown justify-content-end">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{app()->getLocale()}}
                                <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, $link = null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                                @endforeach
    
                            </div>
                        </li>
    
                </ul>
    
                </div>
            </div>
    </nav>