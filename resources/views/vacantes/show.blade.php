@extends('layouts.app')

@section('navegation')

  @if (auth()->user())
    @include('ui.vacanteadmin')  
  @endif

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">{{ $vacante->titulo }}</h1>

@endsection