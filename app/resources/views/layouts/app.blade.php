<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/style.css') }}
    @yield('css')


</head>
<body id="app-layout">

<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
        <a class="navbar-brand pull-right" href="#">
            <i v-show="true" class="fa fa-spinner fa-spin"></i>
        </a>
        <div class="container">
            <sidebar></sidebar>
            @include('partials.navbar')
        </div>
    </nav>

    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <div class="container app-container" id="content-wrap">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @yield('content')

                <app></app>

                <flash message="{{ session('flash') }}"></flash>
            </div>
        </div>
    </div>
</div>

{{ Html::script('js/app.js') }}
@yield('js')

<script type="text/javascript">
</script>

</body>
</html>