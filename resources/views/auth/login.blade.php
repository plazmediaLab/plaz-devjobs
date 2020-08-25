@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-0 sm:flex sm:items-center sm:justify-center">

    <div class="card-form sm:w-7/12 md:w-6/12 lg:w-4/12">

        <div class="card-title">
            {{ __('Login') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf

                <div class="mb-3">
                    <label 
                        for="email" 
                        class="label-form"
                    >
                        {{ __('E-Mail Address') }}
                    </label>

                    <div class="">
                        <input 
                            id="email"
                            type="email" 
                            class="input-form @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" 
                            required autocomplete="email" autofocus
                        >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label 
                        for="password"
                        class="label-form"
                    >
                        {{ __('Password') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                            id="password"
                            type="password" 
                            class="input-form @error('password') is-invalid @enderror" 
                            name="password" 
                            required autocomplete="current-password"
                        >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                    <button type="submit" class="shadow-blue tracking-widest block p-3 uppercase text-center text-white bg-p_blue-500 text-xs w-full rounded">
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
