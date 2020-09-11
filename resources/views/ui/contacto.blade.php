<form 
  action="{{ route('candidatos.store') }}"
  method="POST"
  class="p-4 border border-gray-300 rounded-container"
  novalidate
>
  @csrf

  <h3 class="text-lg font-medium text-center block mb-2">Postular por vacante</h3>
  
  <div class="mb-2">
    <label 
      for="nombre"
      class="label-form"
    >
      Nombre:
    </label>
    <input 
      type="text"
      name="nombre"
      id="nombre"
      class="input-form @error('nombre') input-invalid @enderror"
      placeholder="Nombre completo"
      value="{{ old('nombre') }}"
    >
    @error('nombre')
      <span class="error-message" role="alert">
        <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <div class="mb-2">
    <label 
      for="email"
      class="label-form"
    >
      Email:
    </label>
    <input 
      type="email"
      name="email"
      id="email"
      class="input-form @error('email') input-invalid @enderror"
      placeholder="Correo electrónico"
      value="{{ old('email') }}"
    >
    @error('email')
      <span class="error-message" role="alert">
        <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <div class="mb-10">
    <label 
      for="cv"
      class="label-form"
    >
      Curriculum (CV):
    </label>
    @error('cv')
      <p class="text-red-600 text-xs text-center block">
        Tu curriculum es obligatorio para postular a la vacante
      </p>  
    @enderror
    <label
      id="text-file" 
      for="cv"
      class="flex items-center justify-center p-2 cursor-pointer text-gray-500 rounded hover:text-gray-700 hover:bg-gray-300 overflow-hidden"
    >
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"></path></svg>
      <span class="font-bold inline-block mr-1">PDF</span> - <span id="file-name" class="ml-1">Click aquí para subir tu archivo</span>
    </label>
    <div class="block overflow-hidden">
      <input 
        type="file"
        name="cv"
        id="cv"
        class="hidden"
        accept="application/pdf"
        value="{{ old('cv') }}"
      >
    </div>
    @error('cv')
      <span class="error-message" role="alert">
        <svg viewBox="0 0 20 20" fill="currentColor" class="information-circle w-4 h-4 inline-block"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <input 
    type="hidden"
    name="vacante_id"
    value="{{ $vacante->id }}"
  >

  <button 
    type="submit"
    class="block text-center p-2 rounded border border-carbon-800 bg-carbon-800 uppercase w-full text-xs font-medium text-white tracking-widest hover:bg-white hover:text-carbon-800"
  >
    Enviar
  </button>

</form>

@section('scripts')
    <script>
      document.getElementById('cv').onchange = function(){
        if(this.value){
          document.getElementById('file-name').innerHTML = this.value;
          document.getElementById('text-file').classList.add('text-green-500');
          document.getElementById('text-file').classList.add('bg-green-200');
        }else{
          document.getElementById('text-file').classList.remove('text-green-500');
          document.getElementById('text-file').classList.remove('bg-green-200');
        }
      }
    </script>
@endsection