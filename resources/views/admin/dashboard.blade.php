<x-layouts.app :title="__('Dashboard')">
    <div class="d _dashboard-header">
        <h1>Welcome {{ auth()->user()->name }}</h1>
        <p><span>{{ auth()->user()->role }}</span> dashboard</p>
    </div>

    @session('success')
        <p class="text-green-500">{{ $value }}</p>
    @endsession
    
</x-layouts.app>
