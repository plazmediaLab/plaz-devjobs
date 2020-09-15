@extends ('layouts.app')

@section('navegation')

  @include('ui.vacanteadmin')

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">Administrar vacantes</h1>

  @if ( count($vacantes) > 0 )

    <div class="overflow-x-auto shadow-card_white rounded-container mt-6">
      <div class="align-middle inline-block min-w-full overflow-hidden">
        <table class="table-auto w-full text-carbon-500">
          <thead class="bg-gray-100">
            <tr>
              <th class="table-title w-full">Titulo vacante</th>
              <th class="table-title">Creada</th>
              <th class="table-title bg-gray-200">Estado</th>
              <th class="table-title">Candidatos</th>
              <th class="table-title">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vacantes as $item)
              <tr class="border-t border-gray-300">
                <td class="border px-4 py-2 border-none whitespace-no-wrap">
                  <div class="flex items-center">
                    <div>
                      <a 
                        class="text-sm leading-5 font-medium hover:text-p_blue-500"
                        href="{{ route('vacantes.show', ['vacante' => $item->id]) }}"
                      >
                        {{$item->titulo}}
                      </a>
                      <div class="text-description leading-5 text-gray-500">Categoria: <span class="font-medium text-gray-600">{{ $item->categoria->name }}</span></div>
                    </div>
                  </div>
                </td>
                <td 
                  class="border p-4 border-none whitespace-no-wrap text-center leading-5 font-semibold text-xs text-gray-500"
                  title="{{ $item->created_at->format('l jS \\of F Y h:i:s A') }}"
                >
                  {{ $item->created_at->diffForHumans() }}
                </td>
                <td class="border p-4 border-none whitespace-no-wrap bg-gray-100 text-center">
                  <span class="inline-flex text-xs leading-5 font-semibold rounded-full px-2 {{ $item->activa ? 'bg-purple_grad-100 text-purple_grad-400' : 'bg-gray-200 text-gray-500' }}">
                    {{ $item->activa ? 'Activa' : 'Finalizada' }}
                  </span>
                </td>
                <td class="border p-4 border-none whitespace-no-wrap text-center">
                  <a 
                    href="{{ route('candidatos.index', ['id' => $item->id]) }}" 
                    class="text-gray-500 font-medium hover:underline"
                  >{{ $item->candidatos->count() }}</a>
                </td>
                <td class="p-4 whitespace-no-wrap border-none text-xs font-medium">
                  <div class="flex items-center justify-center space-x-3">
                    <a href="#" class="py-1 px-2 cursor-pointer text-gray-500 hover:text-red-600 hover:bg-red-200 rounded">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </a>
                    <a href="#" class="bg-gray-300 text-p_blue-500 py-1 px-2 rounded cursor-pointer hover:text-green-600 hover:bg-green-200">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                    <a href="{{ route('vacantes.show', ['vacante' => $item->id]) }}" class="bg-p_blue-500 text-white py-1 pl-2 pr-3 rounded cursor-pointer flex items-center hover:bg-p_blue-400">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                      Ver
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="my-3">
      {{ $vacantes->links() }}
    </div>

  @else
      <div id="empty-list"></div>
  @endif

@endsection