<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-background bg-points">

    <nav class="bg-carbon-700 text-white">
        <div class="container mx-auto flex justify-between items-center py-2 pl-4 md:pl-0">
            <a href="{{ url('/') }}" class="font-medium text-lg logo-text">
                {{ config('app.name', 'Laravel') }}
            </a>

            <ul class="flex items-center">
                <!-- Authentication Links -->
                @guest
                    <li>
                        <a class="inline-block py-2 px-4 hover:bg-carbon-600" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="inline-block py-2 px-4 hover:bg-carbon-600" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a id="navbarDropdown" class="inline-block py-2 px-4 hover:bg-carbon-600 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div aria-labelledby="navbarDropdown">
                            <a href="{{ route('logout') }}"
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

    <main class="py-4 text-sm">
        @yield('content')
    </main>

</body>
</html>
