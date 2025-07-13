<x-layouts.app :title="__('eliteShop | Dashboard')">
    @include ('shop-easy.includes.dashboard-head')

    <div class="container">

        <h2>My Shops</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <button data-bs-toggle="modal" data-bs-target="#addShopModal">Add Shop</button>

        <ul>
            @foreach ($shops as $shop)
                <li>
                    <strong>{{ $shop->name }}</strong> - {{ $shop->category }}
                    <a href="{{ route('shops.show', $shop) }}">
                        <button type="button">View This Shop</button>
                    </a>
                    <button data-bs-toggle="modal" data-bs-target="#editShopModal{{ $shop->id }}">Edit</button>
                    <form action="{{ route('shops.destroy', $shop) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>

                @include('shop-easy.shops._partials.edit-shop-modal', ['shop' => $shop])
            @endforeach
        </ul>

        <hr>

        <h3>All Products from Your Shops</h3>

        @if($products->count())
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><a href="{{ request()->fullUrlWithQuery(['sort' => 'name']) }}">Product Name</a></th>
                        <th>Price</th>
                        <th>Description</th>
                        <th><a href="{{ request()->fullUrlWithQuery(['sort' => 'category']) }}">Shop Category</a></th>
                        <th>Shop Name</th>
                        <th><a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at']) }}">Date Added</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    {{ $products->appends(request()->query())->links() }}
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>{{ $product->shop->category }}</td>
                            <td>{{ $product->shop->name }}</td>
                            <td>{{ $product->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->appends(request()->query())->links() }}
        @else
            <p>No products found.</p>
        @endif

    </div>

    @include('shop-easy.shops._partials.add-shop-modal')

</x-layouts.app>

<script src="{{ asset('assets/js/modals.js') }}"></script>