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
        for="password"
        class="label-form"
      >
          Descripción:
      </label>

      <div class="editable border input-form"></div>

      <input type="hidden" name="descripcion" id="descripcion">

    </div>

    <div class="mb-5">
      <label
        for="password"
        class="label-form"
      >
          Imagen Vacante:
      </label>

      <div id="dropzoneDevJobs" class="dropzone input-form"></div>

      <div id="error-message"></div>

      <input type="hidden" name="imagen" id="imagen">

    </div>

    <div class="mb-5">
      <label
        for="password"
        class="label-form"
      >
        Habilidades requeridas:
      </label>

      <div id="example"></div>

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

    Dropzone.autoDiscover = false;

    // Medium editor
    document.addEventListener('DOMContentLoaded', () => {
      const editor = new MediumEditor('.editable', {
        toolbar:{
          buttons: [
            'bold',
            'bold',
            'italic',
            'underline',
            'h2',
            'h3',
            'strikethrough',
            'image',
            'quote',
            'orderedlist',
            'unorderedlist',
            'indent',
            'outdent',
            'justifyLeft',
            'justifyCenter',
            'justifyRight',
            'justifyFull',
          ],
          static: true,
          stric: true,
        },
        placeholder:{
          text: 'Agregá una descripción a la vacante',
          hideOnClick: false
        }
      });

      editor.subscribe('editableInput', (eventObj, editable) => {
        const contenido = editor.getContent();
        document.querySelector('#descripcion').value = contenido;
      });

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
        success: (file, res) => {
          document.querySelector('#error-message').textContent = '';

          // Colocar la referencia de la imagen en el input hiden
          document.querySelector('#imagen').value = res.correcto;

          // Añadir al objeto del archivo, el nombre del servidor
          file.nombreServidor = res.correcto
        },
        // error: (file, res) => {
        //   // console.log(res);
        //   document.querySelector('#error-message').textContent = 'Formato de archivo no valido';
        // },
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
            imagen: file.nombreServidor
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