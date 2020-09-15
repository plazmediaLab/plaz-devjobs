@extends('layouts.app')

@section('navegation')

  @include('ui.vacanteadmin')  

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">Candidatos: <span class="text-purple_grad-500">{{ $vacante->titulo }}</span></h1>
  
  @if ($vacante->candidatos->count() > 0)
      <section class="rounded-card max-w-2xl mx-auto mt-5 overflow-hidden shadow-card_white">
        <div class="overflow-x-auto">
          <table class="table-auto w-full text-carbon-500">
            <thead class="bg-gray-200">
              <tr class="text-gray-400">
                <th class="font-medium p-2">Nombre</th>
                <th class="font-medium p-2">E-mail</th>
                <th class="font-medium p-2">Currículum</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vacante->candidatos as $item)
                <tr class="px-4 py-2 whitespace-no-wrap border-b border-gray-300">
                  <td class="p-4 border-none whitespace-no-wrap w-full font-medium truncate">
                    <p>{{ $item->nombre }}</p>
                  </td>
                  <td class="p-4 border-none whitespace-no-wrap text-gray-500 text-center">
                    <p>{{ $item->email }}</p>
                  </td>
                  <td class="px-8 py-4 border-none whitespace-no-wrap text-gray-500 text-center">
                      <a href="/storage/cv/{{ $item->cv }}" class="flex items-center hover:underline hover:text-red-500">
                      <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                      CV
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>
  @else
      <div class="text-gray-400 max-w-md mx-auto mt-10 flex items-center space-x-3 md:space-x-5 px-5 md:px-0">
        <img 
          src="/images/undraw_male_avatar_323b.svg" 
          alt="Empty list"
          class="w-16 md:w-32 opacity-25"
        >
        <h3 class="text-lg md:text-xl">No hay candidatos para mostrar en esta vacante</h3>
      </div>
  @endif

@endsection