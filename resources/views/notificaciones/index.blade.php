@extends('layouts.app')

@section('navegation')

  @include('ui.vacanteadmin')  

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">Bandeja de entrada</h1>

  <main class="w-full lg:max-w-2xl mx-auto flex items-start mt-5 text-carbon-500">

    <section class="w-7/12 pr-5">
      <ul class="">
        <p class="text-center p-2 bg-purple_grad-500 text-white font-medium flex items-center border-l border-t border-r border-purple_grad-600">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
          Sin leer
        </p>
        @foreach ($unreadNotify as $item)
          @php
            $data = $item->data
          @endphp
          <li 
            class="px-3 py-2 border-b border-l border-r border-gray-300 hover:bg-gray-200"
            onclick="{{ auth()->user()->unreadNotifications->where('id', $item->id)->markAsRead() }}"
          >
            <a 
              href="{{ route('candidatos.index', ['id' => $data['id_vacante'], 'id_notify' => $item->id]) }}"
              class="bg-white"
            >
              <p class="font-medium text-gray-600">
                Vacante: <span class="text-gray-600 font-medium text-title-page">{{ $data['vacante'] }}</span>
              </p>
              <p class="font-medium text-gray-600">Solicitante: <span class="font-light">{{ $data['prospecto'] }}</span></p>
              <p class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</p>
            </a>
          </li>
        @endforeach
      </ul>
    </section>

    <aside class="w-5/12 shadow-card_white">
      <ul >
        <p class="text-center p-2 bg-green-500 text-white font-medium flex items-center">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          Leídas
        </p>
        @foreach ($notifications as $item)
          @php
            $data = $item->data
          @endphp
          @if ($item->read_at)
            <li class="px-3 py-2 border-b border-gray-300">
              <a href="" class="text-gray-500 font-medium hover:text-p_blue-500">{{ $data['vacante'] }}</a>
              <p class="text-xxs text-gray-500">{{ $item->created_at }}</p>
            </li>
          @endif
        @endforeach
      </ul>
    </aside>
    
  </main>
    
@endsection