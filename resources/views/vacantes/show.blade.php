@extends('layouts.app')

@section('navegation')

  @if (auth()->user())
    @include('ui.vacanteadmin')  
  @endif

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">{{ $vacante->titulo }}</h1>
  <div class="flex mt-6">

    <section class="w-4/6 pr-8">
      <header class="flex justify-between items-center mb-3">
        <p class="font-medium text-gray-500">Categoria: 
          <span class="font-light">{{ $vacante->categoria->name }}</span>
        </p>
        <p class="font-medium text-gray-500">Creado: 
          <time class="font-light">{{ $vacante->created_at->diffForHumans() }}</time>
        </p>
      </header>
      <img class="banner object-cover w-full mb-3" src="/storage/vacantes/{{ $vacante->imagen }}" alt="Vacante banner">
      <p class="text-xl font-medium">Descripción: </p>
      <article class="descripcion">
        {!! $vacante->descripcion !!}
      </article>
    </section>

    <aside class="w-2/6 text-carbon-500">

      <section class="shadow-card_white rounded-container p-4 mb-5">
        <header>
          <p class="flex items-center text-lg text-gray-500 font-medium mb-3">
            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
            Reclutador:&nbsp;
            <span class="font-light">
              {{ $vacante->reclutador->name }}
            </span>
          </p>
        </header>
        <p class="text-lg mb-3">
          Salario:
          <span class="font-bold text-purple_grad-600 text-2xl flex items-center">
            <svg class="w-6 h-6 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ $vacante->salario->name }}
          </span>
        </p>
        <p class="text-lg">
          <svg class="w-4 h-4 inline-block align-baseline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
          Experiencia: 
          <span class="font-medium">{{ $vacante->experiencia->name }}</span>
        </p>
        <p class="text-lg">
          <svg class="w-4 h-4 inline-block align-baseline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          Ubicación: 
          <span class="font-medium">{{ $vacante->ubicacion->name }}</span>
        </p>
        
        <hr class="my-4">
        
        <h2 class="block font-medium text-center mb-3">Conocimientos y tecnologías requeridos</h2>
        @php
            $skillsArray = explode(',', $vacante->skills )
        @endphp
        <div class="flex items-center justify-center flex-wrap space-x-1 space-y-1">
          @foreach ($skillsArray as $item)
            <p class="px-3 py-1 rounded-full border border-gray-400 text-gray-500 text-xs">{{ $item }}</p>
          @endforeach
        </div>
      </section>

      @include('ui.contacto')

    </aside>

  </div>

@endsection