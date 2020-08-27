@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-0 sm:flex sm:items-center sm:justify-center">

    <div class="card-form sm:w-7/12 md:w-6/12 lg:w-4/12">

        <div class="card-title flex items-center justify-center">
            <svg viewBox="0 0 20 20" fill="currentColor" class="lock-closed w-6 h-6 mr-2 text-p_blue-500"><path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"></path></svg>
            {{ __('Reset Password') }}
        </div>
        
        <div class="card-body">
        
            @if (session('status'))
                <div class="success-message" role="alert">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="check-circle w-5 h-5 inline-block mr-1"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    {{ session('status') }}
                </div>
            @endif
        
            <form method="POST" action="{{ route('password.email') }}" novalidate>
                @csrf
        
                <div class="mb-6">
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
                        autocomplete="email" autofocus>
    
                    @error('email')
                        <span class="error-message" role="alert">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <button type="submit" class="button-form bg-green-500 text-white hover:bg-green-400">
                    {{ __('Send Password Reset Link') }}
                </button>

            </form>
        
        </div>

    </div>

</div>
@endsection
