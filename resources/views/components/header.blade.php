<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="user">
                    @if(auth()->check())
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a class="dropdown-item auth-link" href="{{route('login')}}">Войти/</a>
                        <a class="dropdown-item auth-link" href="{{route('register')}}">Зарегистрироваться</a>
                    @endif
            </div>
        </div>
    </div>
</nav>
<hr>
