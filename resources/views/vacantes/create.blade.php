@extends ('layouts.app')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('navegation')

  @include('ui.vacanteadmin')

@endsection

@section('content')

  <h1 class="text-2xl text-carbon-500 text-center">Nueva vacantes</h1>

  <form
    action="{{ route('vacantes.store') }}"
    method="POST"
    class="max-w-lg mx-auto my-10 shadow-card_white p-4 text-carbon-500 placeholder-gray-500"
  >

    @csrf

    <div class="mb-5">
      <label
        for="titulo"
        class="label-form"
      >
          Titulo vacante:
      </label>
      <input
        autofocus
        id="titulo"
        name="titulo"
        type="text"
        class="input-form @error('titulo') input-invalid @enderror"
        placeholder="Escríbe el titulo de la vacante"
        value="{{ old('titulo') }}"
      >
      @error('titulo')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror
    </div>

    <div class="mb-5">
      <label
        for="categoria"
        class="label-form"
      >
          Categorías:
      </label>

      <select
        name="categoria"
        id="categoria"
        class="input-form truncate @error('categoria') input-invalid @enderror"
      >
        <option selected disabled>--- Selecciona la categoría ---</option>
        @foreach ($categorias as $categoria)
          <option
            {{ old('categoria') == $categoria->id ? 'selected' : '' }}
            value="{{ $categoria->id }}"
          >
            {{$categoria->name}}
          </option>
        @endforeach
      </select>
      @error('categoria')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror
    </div>

    <div class="mb-5">
      <label
        for="experiencia"
        class="label-form"
      >
          Experiencias:
      </label>

      <select
        name="experiencia"
        id="experiencia"
        class="input-form truncate @error('experiencia') input-invalid @enderror"
      >
        <option selected disabled>--- Selecciona la experiencia ---</option>
        @foreach ($experiencias as $experiencia)
          <option
            {{ old('experiencia') == $experiencia->id ? 'selected' : '' }}
            value="{{ $experiencia->id }}"
          >
            {{$experiencia->name}}
          </option>
        @endforeach
      </select>
      @error('experiencia')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror
    </div>

    <div class="mb-5">
      <label
        for="skills"
        class="label-form"
      >
        <div class="flex items-center mb-3">
          <div class="w-5 inline-block mr-1 animate-spin-slow">
            <svg viewBox="0 0 34 32" {...props}>
              <path
                fill="#52c2df"
                d="M19.314 15.987a2.392 2.392 0 11-4.784 0 2.392 2.392 0 014.784 0z"
              />
              <path
                fill="#52c2df"
                d="M16.922 24.783c1.878 1.826 3.729 2.906 5.221 2.906.489 0 .952-.103 1.337-.334 1.337-.772 1.826-2.701 1.363-5.453-.077-.489-.18-.977-.309-1.492.514-.154.977-.309 1.44-.463 2.598-1.003 4.038-2.392 4.038-3.909 0-1.543-1.44-2.932-4.038-3.909-.463-.18-.926-.334-1.44-.463.129-.514.232-1.003.309-1.492.437-2.803-.051-4.758-1.389-5.53-.386-.231-.849-.334-1.337-.334-1.466 0-3.344 1.08-5.221 2.906-1.852-1.826-3.704-2.906-5.195-2.906-.489 0-.952.103-1.337.334-1.337.772-1.826 2.701-1.363 5.453.077.489.18.977.309 1.492-.514.154-.977.309-1.44.463-2.598 1.003-4.038 2.392-4.038 3.909 0 1.543 1.44 2.932 4.038 3.909.463.18.926.334 1.44.463a16.882 16.882 0 00-.309 1.492c-.437 2.752.051 4.707 1.363 5.453.386.232.849.334 1.337.334 1.492.051 3.344-1.029 5.221-2.829zm-1.441-3.472c.463.026.952.026 1.44.026s.977 0 1.44-.026a24.523 24.523 0 01-1.44 1.723 24.252 24.252 0 01-1.44-1.723zm-3.189-2.649c.257.437.489.849.772 1.26a27.786 27.786 0 01-2.263-.386c.232-.694.489-1.415.797-2.135.206.411.437.849.694 1.26zM10.8 12.463c.72-.154 1.466-.283 2.263-.386-.257.412-.514.823-.772 1.26s-.489.849-.694 1.286a17.109 17.109 0 01-.797-2.161zm1.415 3.524c.334-.694.694-1.389 1.106-2.083.386-.669.823-1.337 1.26-2.006a35.293 35.293 0 014.682 0c.463.669.874 1.337 1.26 2.006.412.694.772 1.389 1.106 2.083a26.922 26.922 0 01-1.106 2.083c-.386.669-.823 1.337-1.26 2.006a35.293 35.293 0 01-4.682 0 28.695 28.695 0 01-1.26-2.006 27.106 27.106 0 01-1.106-2.083zm10.057-1.389l-.694-1.286c-.257-.437-.489-.849-.772-1.26.797.103 1.543.232 2.263.386-.231.72-.489 1.44-.797 2.161zm0 2.778c.309.72.566 1.44.797 2.135-.72.154-1.466.283-2.263.386.257-.412.514-.823.772-1.26.232-.386.463-.823.694-1.26zm.591 8.925c-.206.129-.463.18-.746.18-1.26 0-2.829-1.029-4.372-2.572a26.868 26.868 0 002.186-2.701 23.619 23.619 0 003.447-.54c.129.463.206.926.283 1.389.36 2.186.077 3.755-.797 4.244zm1.338-13.555c2.881.823 4.604 2.083 4.604 3.241 0 1.003-1.183 2.006-3.266 2.804-.412.154-.874.309-1.337.437a27.01 27.01 0 00-1.26-3.241c.514-1.106.952-2.186 1.26-3.241zm-2.058-7.253c.283 0 .514.051.746.18.849.489 1.157 2.032.797 4.244-.077.437-.18.9-.283 1.389a33.072 33.072 0 00-3.447-.54 23.774 23.774 0 00-2.186-2.701c1.543-1.518 3.112-2.572 4.372-2.572zm-3.781 5.17c-.463-.026-.952-.026-1.44-.026s-.977 0-1.44.026c.463-.617.952-1.183 1.44-1.723.489.54.977 1.132 1.44 1.723zm-7.382-4.99c.206-.129.463-.18.746-.18 1.26 0 2.829 1.029 4.372 2.572a26.756 26.756 0 00-2.186 2.701 23.619 23.619 0 00-3.447.54c-.129-.463-.206-.926-.283-1.389-.36-2.186-.077-3.729.797-4.244zM9.643 19.228c-2.881-.823-4.604-2.083-4.604-3.241 0-1.003 1.183-2.006 3.266-2.803.412-.154.874-.309 1.337-.437a27.01 27.01 0 001.26 3.241c-.514 1.106-.952 2.212-1.26 3.241zm.54 2.829c.077-.437.18-.9.283-1.389 1.08.232 2.238.412 3.447.54a23.774 23.774 0 002.186 2.701c-1.543 1.517-3.112 2.572-4.372 2.572-.283 0-.514-.051-.746-.18-.875-.489-1.157-2.058-.797-4.244z"
              />
            </svg>
          </div>
          Habilidades requeridas:&nbsp;
          <span class="text-red-600 text-label font-medium lowercase">
            @error('skills') Selecciona al menos 3 habilidades para la vacante  @enderror
          </span>
        </div>
      </label>

      <div id="skills-list"></div>

      <input type="hidden" name="skills" id="skills">
      @error('skills')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror

    </div>

    <div class="mb-5">
      <label
        for="ubicacion"
        class="label-form"
      >
          Ubicación:
      </label>

      <select
        name="ubicacion"
        id="ubicacion"
        class="input-form truncate @error('ubicacion') input-invalid @enderror"
      >
        <option selected disabled>--- Selecciona la ubicación ---</option>
        @foreach ($ubicacions as $ubicacion)
          <option
            {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
            value="{{ $ubicacion->id }}"
          >
            {{$ubicacion->name}}
          </option>
        @endforeach
      </select>
      @error('ubicacion')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror
    </div>

    <div class="mb-5">
      <label
        for="salario"
        class="label-form"
      >
          Salario:
      </label>

      <select
        name="salario"
        id="salario"
        class="input-form truncate @error('salario') input-invalid @enderror"
      >
        <option selected disabled>--- Selecciona el salario USD ---</option>
        @foreach ($salarios as $salario)
          <option
            {{ old('salario') == $salario->id ? 'selected' : '' }}
            value="{{ $salario->id }}"
          >
            {{$salario->name}}
          </option>
        @endforeach
      </select>
      @error('salario')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror
    </div>

    <div class="mb-5">
      <label
        for="descripcion"
        class="label-form"
      >
          Descripción:
      </label>

      <textarea 
        name="descripcion"
        id="descripcion"
        rows="5"
        placeholder="Agregá una descripción a la vacante"
        class="resize-y border input-form @error('descripcion') input-invalid @enderror"
      >{{ old('descripcion') }}</textarea>

      @error('descripcion')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror

    </div>

    <div class="mb-5">
      <label
        for="password"
        class="label-form"
      >
          Imagen Vacante:
      </label>

      <div id="dropzoneDevJobs" class="dropzone input-form @error('imagen') error-drop @enderror"></div>

      <div id="error-message"></div>

      <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">
      @error('imagen')
        <p class="text-red-600 text-xs font-medium flex items-center bg-red-100 p-2">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-4 h-4 stroke-1 inline-block mr-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ $message }}
        </p>
      @enderror

    </div>

    <button
      type="submit"
      class="button-form text-white bg-carbon-700 hover:bg-carbon-600"
    >
      Publicar vacante
    </button>

  </form>


@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>

  <script>

    let oldSkills = {!! json_encode(old('skills')) !!};

    Dropzone.autoDiscover = false;

    // Medium editor
    document.addEventListener('DOMContentLoaded', () => {

      // Dropzone
      const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
        url: '/vacantes/imagen',
        headers: {
          'X-CSRF-TOKEN': document.querySelector("meta[name=csrf-token]").content
        },
        dictDefaultMessage: 'Arrastra los archivos aquí o haz clic para subirlos..',
        dictResponseError: 'No se puede cargar archivos de este tipo.',
        dictRemoveFile: 'Borrar archivo',
        acceptedFiles: '.png, .jpg, .jpeg, .gif, .bmp',
        maxFiles: 1,
        addRemoveLinks: true,
        init: function(){
          if(document.querySelector('#imagen').value.trim()){
            let imagenPublicada = {};

            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('#imagen').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-sucess');
            imagenPublicada.previewElement.classList.add('dz-complete');
          }
        },
        success: (file, res) => {
          document.querySelector('#error-message').textContent = '';

          // Colocar la referencia de la imagen en el input hiden
          document.querySelector('#imagen').value = res.correcto;

          // Añadir al objeto del archivo, el nombre del servidor
          file.nombreServidor = res.correcto
        },
        maxfilesexceeded: (file) => {
          const _ref = dropzoneDevJobs;

          if(_ref.files[1] != null){
            _ref.removeFile(_ref.files[0]); // Elimina el archivo anterior
            _ref.files.length = 0;
            _ref.addFile(file); // Agrega el nuevo archivo
          }
        },
        removedfile: (file, res) => {
          file.previewElement.parentNode.removeChild(file.previewElement);

          params = {
            imagen: file.nombreServidor ?? document.querySelector('#imagen').value
          }

          axios.post('/vacantes/borrarimagen', params)
              .then(res => console.log(res));
        },
        dragover: () => {
          document.querySelector('#dropzoneDevJobs').classList.add('drag-hover');
        },
        dragleave: () => {
          document.querySelector('#dropzoneDevJobs').classList.remove('drag-hover');
        }
      });

    });


  </script>
@endsection