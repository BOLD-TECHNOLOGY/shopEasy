<x-layouts.app :title="__('eliteShop | Products')">
    @include ('shop-easy.includes.dashboard-head')

    <div class="container">
        <h2>All Products from My Shops</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Product Name</th>
                    <th>Shop Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $index }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->shop->name }}</td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                                View
                            </button>
                        </td>
                    </tr>
                    
                    @include('shop-easy.products._partials.edit-product-modal', ['product' => $product])
                @empty
                    <tr>
                        <td colspan="4">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</x-layouts.app>

<script src="{{ asset('assets/js/modals.js') }}"></script>