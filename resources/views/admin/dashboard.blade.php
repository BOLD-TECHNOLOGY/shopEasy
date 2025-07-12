<x-layouts.app :title="__('eliteShop | Dashboard')">
    @include ('shop-easy.includes.dashboard-head')

    @session('success')
        <p class="text-green-500">{{ $value }}</p>
    @endsession
    
</x-layouts.app>
