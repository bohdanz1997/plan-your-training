<ul class="main-menu">
    <li><a class="logo" href="{{ route('home') }}">{{ config('app.name') }}</a></li>
    <router-link to="/home">Home</router-link>
    <router-link to="/workout">Workout</router-link>

@if (Auth::guest())
        <li><a href="{{ route('login') }}">Вхід</a></li>
        <li><a href="{{ route('register') }}">Реєстрація</a></li>
    @else
        <li><a href="{{ route('training.history') }}">Історія тренувань</a></li>
        <li><a href="#">Статистика</a></li>
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



{{--<li class="nav-dropdown-container learn">--}}
{{--<a class="nav-link current">Menu Item</a>--}}
{{--<ul class="nav-dropdown">--}}
{{--<li>--}}
{{--<ul>--}}
{{--<li><a href="#" class="nav-link current">Link</a></li>--}}
{{--<li><a href="#" class="nav-link">Link</a></li>--}}
{{--<li><a href="#" class="nav-link">Link</a></li>--}}
{{--<li><a href="#" class="nav-link">Link</a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}