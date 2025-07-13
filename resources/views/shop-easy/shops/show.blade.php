<x-layouts.app :title="__('eliteShop | Dashboard')">
    @include('shop-easy.includes.dashboard-head')

    <div class="container">
        <h2>Shop: {{ $shop->name }}</h2>
        <p>Category: {{ $shop->category }}</p>
        <p>{{ $shop->description }}</p>

        <hr>

        <h4>Products</h4>

        <button data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>

        <ul>
            @forelse ($products as $product)
                <li>
                    <strong>{{ $product->name }}</strong> - ${{ $product->price }}<br>
                    <em>{{ $product->description }}</em><br>
                    <small>Belongs to: {{ $product->shop->name }}</small><br>

                    {{-- Edit/Delete buttons --}}
                    <button data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">Edit</button>

                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>

                    @include('shop-easy.products._partials.edit-product-modal', ['product' => $product])
                </li>
            @empty
                <li>No products added yet.</li>
            @endforelse
        </ul>
    </div>

    @include('shop-easy.products._partials.add-product-modal', ['shop' => $shop])
</x-layouts.app>
