@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 flex md:px-0 sm:flex sm:items-center sm:justify-center">

    <div class="card-form sm:w-7/12 md:w-6/12 lg:w-4/12">
        <div class="card-title">
            {{ __('Register') }}
        </div>
        

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="w-full" novalidate>
                @csrf

                <div class="mb-3">
                    <label 
                        for="name" 
                        class="label-form"
                    >
                        {{ __('Name') }}
                    </label>
                    <input 
                        id="name" 
                        type="text" 
                        class="input-form @error('name') input-invalid @enderror" 
                        name="name" value="{{ old('name') }}" 
                        autocomplete="name" autofocus
                    >
                    @error('name')
                        <span class="novalid-input" role="alert">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                        autocomplete="email"
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
                        autocomplete="new-password"
                    >
                    @error('password')
                        <span class="novalid-input" role="alert">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label 
                        for="password-confirm" 
                        class="label-form"
                    >
                        {{ __('Confirm Password') }}
                    </label>
                    <input 
                        id="password-confirm"
                        type="password"
                        class="input-form"
                        name="password_confirmation" 
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="button-form bg-carbon-700 text-white hover:border hover:border-carbon-700 hover:text-carbon-700 hover:bg-transparent">
                    {{ __('Register') }}
                </button>

            </form>
        </div>

    </div>

    <div class="hidden md:block md:w-6/12 lg:w-5/12 pl-6">
        <h1 class="gradient-title text-4xl lg:text-5xl font-black text-center tracking-tight">¿Eres reclutador?</h1>
        <p class="text-lg text-carbon-300 font-medium text-center px-5 mb-8 lg:mb-5">Crea una cuenta totalmente gratis y comienza a publicar hasta 10 vacantes de tu empresa</p>
        <img src="images/undraw_news_go0e.svg" alt="Reclutamiento laboral">
    </div>

</div>
@endsection
