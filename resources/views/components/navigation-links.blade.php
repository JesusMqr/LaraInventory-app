<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    @hasanyrole('admin|user|supervisor')
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs(['dashboard','dashboard.*'])">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('categories')" :active="request()->routeIs(['categories','categories.*','products','products.*'])">
        {{ __('Inventario') }}
    </x-nav-link>
    <x-nav-link :href="route('stock_refill.index')" :active="request()->routeIs(['stock_refill','stock_refill.*'])">
        {{ __('Solicitudes stock') }}
    </x-nav-link>
    @endhasanyrole
    @hasanyrole('admin|supervisor')
    <x-nav-link :href="route('records')" :active="request()->routeIs(['records','records.*'])">
        {{ __('Registros') }}
    </x-nav-link>
    @endhasanyrole
    @role('admin')
    <x-nav-link :href="route('users')" :active="request()->routeIs(['users','users.*'])">
        {{ __('Usuarios') }}
    </x-nav-link>
    @endrole



</div>