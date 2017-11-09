<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    @if (!Auth::guest())
        <ul class="nav navbar-nav visible-xs">
            <li><a href="{{ route('training.history') }}">Історія тренувань</a></li>
            <li><a href="#">Статистика</a></li>
        </ul>
    @endif

<!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li><a href="{{ route('account.index') }}">Особистий кабінет</a></li>
            <li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Вихід
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @endif
    </ul>
</div>