@extends ('layouts.app')

@section('navegation')

  @include('ui.vacanteadmin')

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">Nueva vacantes</h1>

  <form 
    action=""
    class="max-w-lg mx-auto my-10 shadow-card_white p-4 text-carbon-500"
  >
    <div class="mb-5">
      <label 
        for="password"
        class="label-form"
      >
          Titulo vacante: 
      </label>
      <input 
        id="titulo"
        name="titulo" 
        type="text" 
        class="input-form" 
      >
    </div>

    <div class="mb-5">
      <label 
        for="password"
        class="label-form"
      >
          Categorías: 
      </label>

      <select 
        name="categorias" 
        id="categorias"
        class="input-form truncate"
      >
        <option selected disabled>--- Selecciona la categoría ---</option>
        @foreach ($categorias as $categoria)
          <option value="{{ $categoria->id }}">{{$categoria->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-5">
      <label 
        for="password"
        class="label-form"
      >
          Experiencias: 
      </label>

      <select 
        name="experiencias" 
        id="experiencias"
        class="input-form truncate"
      >
        <option selected disabled>--- Selecciona la experiencia ---</option>
        @foreach ($experiencias as $experiencia)
          <option value="{{ $experiencia->id }}">{{$experiencia->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-5">
      <label 
        for="password"
        class="label-form"
      >
          Ubicación: 
      </label>

      <select 
        name="ubicacions" 
        id="ubicacions"
        class="input-form truncate"
      >
        <option selected disabled>--- Selecciona la ubicación ---</option>
        @foreach ($ubicacions as $ubicacion)
          <option value="{{ $ubicacion->id }}">{{$ubicacion->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-5">
      <label 
        for="password"
        class="label-form"
      >
          Salario: 
      </label>

      <select 
        name="salarios" 
        id="salarios"
        class="input-form truncate"
      >
        <option selected disabled>--- Selecciona el salario USD ---</option>
        @foreach ($salarios as $salario)
          <option value="{{ $salario->id }}">{{$salario->name}}</option>
        @endforeach
      </select>
    </div>

    <button 
      type="submit"
      class="button-form text-white bg-carbon-700 hover:bg-carbon-600"
    >
      Publicar vacante
    </button>
  </form>

@endsection