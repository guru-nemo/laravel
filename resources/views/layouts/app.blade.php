<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap-4.0.0.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/my.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="navbar-nav">
		@if (Auth::guest())
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
			<li class="nav-item"><a class="navbar-brand" href="#">{{ Auth::user()->name }}</a></li>
		    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
            Logout
            </a></li>
			<li class="nav-item"><a class="navbar-brand" href="{{ url('/api') }}">API</a></li>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
            </form>
		@endif
		</div>
	</nav>

        @yield('content')
    </div>

    <!-- Scripts -->
	<script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
