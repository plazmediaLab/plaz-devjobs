@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-0 sm:flex sm:items-center sm:justify-center">

    <div class="card-form sm:w-7/12 md:w-6/12 lg:w-4/12">

        <div class="card-title flex items-center justify-center">
            {{ __('Reset Password') }}
        </div>
        
        <div class="card-body">
        
            <form method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf
        
                <input type="hidden" name="token" value="{{ $token }}">
        
                <div class="form-group row">
                    <label 
                        for="email" class="label-form"
                    >
                        {{ __('E-Mail Address') }}
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        class="input-form @error('email') input-invalid @enderror" 
                        name="email" 
                        value="{{ $email ?? old('email') }}" 
                        autocomplete="email" autofocus>
                    @error('email')
                        <span class="error-message" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group row">
                    <label 
                        for="password" class="label-form"
                    >
                        {{ __('Password') }}
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        class="input-form @error('password') input-invalid @enderror" 
                        name="password" 
                        autocomplete="new-password">
                    @error('password')
                        <span class="error-message" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group row">
                    <label 
                        for="password-confirm" class="label-form"
                    >
                        {{ __('Confirm Password') }}
                    </label>
                    <input 
                        id="password-confirm" 
                        type="password" 
                        class="input-form" 
                        name="password_confirmation" 
                        autocomplete="new-password">
                </div>
        
                <button type="submit" class="button-form bg-carbon-700 text-white hover:bg-transparent hover:border-carbon-700 hover:text-carbon-500 mt-5">
                    {{ __('Reset Password') }}
                </button>

            </form>
        
        </div>

    </div>

</div>
@endsection
