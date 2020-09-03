<a 
  href="{{ route('vacantes.index') }}"
  class="text-xs py-2 px-3 text-white uppercase font-light {{ Request::is('vacantes') ? 'bg-purple_grad-700' : '' }}"
>
  Ver vacantes
</a>
<a 
  href="{{ route('vacantes.create') }}"
  class="text-xs py-2 px-3 text-white uppercase font-light {{ Request::is('vacantes/create') ? 'bg-purple_grad-700' : '' }}"
>
  Nueva vacante
</a>