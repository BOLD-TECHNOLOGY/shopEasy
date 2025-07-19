<x-layouts.app :title="__('eliteShop | Dashboard')">
    @include('shop-easy.includes.dashboard-head')

    <div class="container py-4">
        <h2 class="mb-3">Shop: {{ $shop->name }}</h2>
        <p><strong>Category:</strong> {{ $shop->category }}</p>
        <p>{{ $shop->description }}</p>

        <hr class="my-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Products</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
        </div>

        @if($products->count())
            <ul class="list-group">
                @foreach ($products as $product)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>{{ $product->name }}</strong> — ${{ number_format($product->price, 2) }}<br>
                                <em>{{ Str::limit($product->description, 100) }}</em><br>
                                <small class="text-muted">Belongs to: {{ $product->shop->name }}</small>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">Edit</button>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>

                        {{-- Edit Modal --}}
                        @include('shop-easy.products._partials.edit-product-modal', ['product' => $product])
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-info mt-3">No products added yet.</div>
        @endif
    </div>

    {{-- Add Product Modal --}}
    @include('shop-easy.products._partials.add-product-modal', ['shop' => $shop])
</x-layouts.app>
