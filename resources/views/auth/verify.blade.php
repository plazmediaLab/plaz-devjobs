@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-0 sm:flex sm:items-center sm:justify-center">

    <div class="bg-purple-500 border-b-4 border-purple-700 px-8 py-8 rounded-extra text-white w-full flex items-center flex-col text-center md:text-left md:p-3 md:flex-row">

        <div class="w-40 h-40 mb-2 rounded-full bg-white inline-block md:mb-0 md:w-24 md:h-24">
            <img src="../images/undraw_Mailbox_re_dvds.svg" alt="Email send" class="p-3">
        </div>

        <div class="flex-1 ml-3">
            <h2 class="text-2xl font-medium mb-2 md:mb-1">{{ __('Verify Your Email Address') }}</h2>
            
            <div class="">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
            
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="mt-3 md:mt-1" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="w-full mt-2 px-3 py-2 rounded uppercase text-xs border border-white hover:bg-white hover:shadow hover:text-carbon-400 sm:w-auto">{{ __('click here to request another') }}</button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
