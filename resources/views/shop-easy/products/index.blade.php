<x-layouts.app :title="__('eliteShop | Products')">
    @include ('shop-easy.includes.dashboard-head')

    <div class="container mt-4">
        <h2 class="mb-3">All Products from My Shops</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Shop</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td>{{ $products->firstItem() + $index }}</td>
                            <td>
                                @if($product->thumbnail)
                                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}" width="50" height="50" style="object-fit: cover;">
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <strong>${{ number_format($product->price, 2) }}</strong>
                                @if($product->on_sale && $product->sale_price)
                                    <br><span class="text-danger">${{ number_format($product->sale_price, 2) }}</span>
                                @endif
                            </td>
                            <td>{{ $product->stock ?? 'N/A' }}</td>
                            <td>{{ $product->shop->name }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                                    View/Edit
                                </button>
                            </td>
                        </tr>

                        {{-- Include Modal --}}
                        @include('shop-easy.products._partials.edit-product-modal', ['product' => $product])
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</x-layouts.app>

<script src="{{ asset('assets/js/modals.js') }}"></script>
