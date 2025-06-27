<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Admin Dashboard') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('System Management') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @session('success')
        <p class="text-green-500">{{ $value }}</p>
    @endsession
    
</x-layouts.app>
