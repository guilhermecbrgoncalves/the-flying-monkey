<nav class="navbar navbar-expand-lg navbar-light bg-monkey fixed-top border-bottom">
    <a class="navbar-brand" href="{{route('home')}}">the flying monkey</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">my airports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('my-logbook')}}">my logbook</a>
        </li>
      </ul>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::check())
                    {{auth()->user()->name}}
                    <img class="img-navbar rounded-circle ml-2 mr-2 border" src="/storage/{{auth()->user()->avatar}}">
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">preferences</a>
                  <a class="dropdown-item" href="{{url('users/' . auth()->user()->id)}}">profile</a>
                  <a class="dropdown-item" href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
              </li>
          </ul>
    </div>
  </nav>
  