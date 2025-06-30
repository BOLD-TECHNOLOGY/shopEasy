<x-layouts.app :title="__('eliteShop | Dashboard')">
    @include ('shop-easy.includes.dashboard-head')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">My Shops</h2>
                    <button type="button" class="btn btn-primary d_btn d_btn-primary" data-bs-toggle="modal" data-bs-target="#d_newShopModal">
                        <i class="bi bi-plus-circle me-2"></i>Create New Shop
                    </button>
                </div>

                @php
                    $shops = $shops ?? collect(); // Provide empty collection as default
                @endphp

                @if($shops->count() > 0)
                    <div class="row">
                        @foreach($shops as $shop)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">{{ $shop->shop_name }}</h5>
                                        <span class="badge bg-primary">{{ ucfirst($shop->category) }}</span>
                                    </div>
                                    <div class="card-body">
                                        @if($shop->description)
                                            <p class="card-text">{{ Str::limit($shop->description, 100) }}</p>
                                        @endif
                                        
                                        <div class="small text-muted">
                                            @if($shop->email)
                                                <div class="mb-1">
                                                    <i class="bi bi-envelope me-1"></i>{{ $shop->email }}
                                                </div>
                                            @endif
                                            @if($shop->phone)
                                                <div class="mb-1">
                                                    <i class="bi bi-telephone me-1"></i>{{ $shop->phone }}
                                                </div>
                                            @endif
                                            @if($shop->address)
                                                <div class="mb-1">
                                                    <i class="bi bi-geo-alt me-1"></i>{{ Str::limit($shop->address, 50) }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                Created {{ $shop->created_at->diffForHumans() }}
                                            </small>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('shops.show', $shop) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
                                                <a href="{{ route('shops.edit', $shop) }}" class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteShop({{ $shop->id }})">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $shops->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="bi bi-shop text-muted" style="font-size: 4rem;"></i>
                        </div>
                        <h4 class="text-muted">No shops created yet</h4>
                        <p class="text-muted">Create your first shop to get started!</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#d_newShopModal">
                            Create Your First Shop
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @session('success')
        <p class="text-green-500">{{ $value }}</p>
    @endsession
    
</x-layouts.app>
