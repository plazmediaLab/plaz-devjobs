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

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{auth()->check() ? 'bg-white' : 'bg-background bg-points'}}">

    <nav class="bg-carbon-700 text-white">
        <div class="container mx-auto flex justify-between items-center py-2 pl-4 md:pl-0">
            <a href="{{ url('/') }}" class="font-medium text-lg relative">
                <!-- {{ config('app.name', 'Laravel') }} -->
                PLAZ-<span class="logo-text">Devjobs</span>
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
                    <li class="flex items-center">
                        <a id="navbarDropdown" class="inline-block py-2 px-4 hover:bg-carbon-600 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div aria-labelledby="navbarDropdown" class="ml-2">
                            <a 
                                title="{{ __('Logout') }}"
                                href="{{ route('logout') }}" 
                                class="rounded-full border border-carbon-500 p-2 flex items-center justify-center bg-carbon-600 text-carbon-200 hover:text-white hover:bg-carbon-500 hover:border-carbon-400"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                            >
                                <svg viewBox="0 0 20 20" fill="currentColor" class="logout w-4 h-4 inline-block"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
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

    <div class="bg-gradient-to-r from-purple_grad-500 to-orange_grad-500">
        <nav class="container mx-auto flex space-x-1">
            @yield('navegation')
        </nav>
    </div>

    <main class="py-4 text-sm container mx-auto px-2">
        @yield('content')
    </main>

    @yield('scripts')

</body>
</html>
