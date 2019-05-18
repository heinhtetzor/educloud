<nav class="navbar navbar-expand-md bg-light navbar-light fixed-height">

    <a class="navbar-brand" href="#">EduCloud</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <!-- links for auth Users -->
        @if(Auth::check())
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('courses') }}">Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('wiki') }}">Wiki</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" href="{{ url('community') }}">Community</a>
            </li>  
        </ul>
        @endif

        <ul class="navbar-nav ml-auto">
        <!-- links for guests -->
        @guest

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif

        @else 

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if( Auth::user()->photo )
                    <img src="{{ asset('../storage/profile/' .Auth::user()->photo) }}" class="rounded-circle z-depth-0"
                    alt="avatar image" height="35">
                @else
                    <img src="{{ asset('storage/profile/default/user.png') }}" class="rounded-circle z-depth-0"
                    alt="avatar image" height="35">
                @endif
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                <a class="dropdown-item" href="{{ url('wiki/create') }}">New Wiki</a>
                <a class="dropdown-item" href="{{ url('courses') }}">Create Courses</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

        @endguest

        </ul>
    </div>  
</nav>