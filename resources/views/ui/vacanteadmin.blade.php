<a 
  href="{{ route('vacantes.index') }}"
  class="text-xs p-3 text-white uppercase font-light {{ Request::is('vacantes') ? 'bg-p_blue-600' : '' }}"
>
  Ver vacantes
</a>
<a 
  href="{{ route('vacantes.create') }}"
  class="text-xs p-3 text-white uppercase font-light {{ Request::is('vacantes/create') ? 'bg-p_blue-600' : '' }}"
>
  Nueva vacante
</a>