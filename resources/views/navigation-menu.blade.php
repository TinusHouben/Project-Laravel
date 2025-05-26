<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>

<x-nav-link :href="route('teams')" :active="request()->routeIs('teams')">
    {{ __('Teams') }}
</x-nav-link>



