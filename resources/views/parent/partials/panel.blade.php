<h2 class="text-xs font-semibold leading-tight text-gray-800">
    {{ __('parent control panel') }}
</h2>

<h2 class="text-xs font-semibold leading-tight text-gray-800">
    {{ auth()->user()->name }}
</h2>
<h2 class="text-xs font-semibold leading-tight text-gray-800">
    Rol: {{ auth()->user()->roles->first()->name ?? 'No tiene rol asignado' }}
</h2>
<h2 class="text-xs font-semibold leading-tight text-gray-800">
    Rol: {{ auth()->user()->roles->first()->permissions()->pluck('privilege') ?? 'No tiene rol asignado' }}
</h2>
<h2 class="text-xs font-semibold leading-tight text-gray-800">
    Coordinador: {{ auth()->user()->coordina->first()->name ?? 'No es Coordinador de Sede' }}
</h2>
