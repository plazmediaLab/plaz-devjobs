@extends ('layouts.app')

@section('navegation')

  @include('ui.vacanteadmin')

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">Nueva vacantes</h1>

  <form 
    action=""
    class="max-w-lg mx-auto my-10 shadow-card_white p-4"
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
        class="input-form @error('password') input-invalid @enderror" 
      >
    </div>

    <button 
      type="submit"
      class="button-form text-white bg-carbon-900 hover:bg-carbon-600"
    >
      Publicar vacante
    </button>
  </form>

@endsection