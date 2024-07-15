<div class="pt-2 pb-3 space-y-1">
    @hasanyrole('admin|user|supervisor')
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs(['dashboard','dashboard.*'])">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route('categories')" :active="request()->routeIs(['categories','categories.*','products','products.*'])">
        {{ __('Inventario') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route('stock_refill.index')" :active="request()->routeIs(['stock_refill','stock_refill.*'])">
        {{ __('Solicitudes stock') }}
    </x-responsive-nav-link>
    @endhasanyrole
    @hasanyrole('admin|supervisor')
    <x-responsive-nav-link :href="route('records')" :active="request()->routeIs(['records','records.*'])">
        {{ __('Registros') }}
    </x-responsive-nav-link>
    @endhasanyrole
    @role('admin')
    <x-responsive-nav-link :href="route('users')" :active="request()->routeIs(['users','users.*'])">
        {{ __('Usuarios') }}
    </x-responsive-nav-link>
    @endrole

</div>