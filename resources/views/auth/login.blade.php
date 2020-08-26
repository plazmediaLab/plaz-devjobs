@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-0 sm:flex sm:items-center sm:justify-center">

    <div class="card-form sm:w-7/12 md:w-6/12 lg:w-4/12">

        <div class="card-title">
            {{ __('Login') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="w-full" novalidate>
                @csrf

                <div class="mb-3">
                    <label 
                        for="email" 
                        class="label-form"
                    >
                        {{ __('E-Mail Address') }}
                    </label>
                    <input 
                        id="email"
                        type="email" 
                        class="input-form @error('email') input-invalid @enderror" 
                        name="email" value="{{ old('email') }}" 
                        autocomplete="email" autofocus
                    >

                    @error('email')
                        <span class="novalid-input" role="alert">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label 
                        for="password"
                        class="label-form"
                    >
                        {{ __('Password') }}
                    </label>
                    <input 
                        id="password"
                        type="password" 
                        class="input-form @error('password') input-invalid @enderror" 
                        name="password" 
                        autocomplete="current-password"
                    >

                    @error('password')
                        <span class="novalid-input" role="alert">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input 
                        type="checkbox" 
                        name="remember" id="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="label-form" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div>
                    <button type="submit" class="button-form text-white bg-p_blue-500 shadow-blue hover:bg-p_blue-400">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="link-form text-center" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
