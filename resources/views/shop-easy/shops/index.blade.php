<x-layouts.app :title="__('eliteShop | Shops')">
    @include('shop-easy.includes.dashboard-head')

    <div class="container py-4">
        <h2 class="mb-4">My Shops</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addShopModal">Add Shop</button>

        <ul class="list-group mb-4">
            @foreach ($shops as $shop)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $shop->name }}</strong> — <em>{{ $shop->category }}</em>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('shops.show', $shop) }}" class="btn btn-sm btn-outline-info">View</a>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editShopModal{{ $shop->id }}">Edit</button>
                        <form action="{{ route('shops.destroy', $shop) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </li>

                @include('shop-easy.shops._partials.edit-shop-modal', ['shop' => $shop])
            @endforeach
        </ul>

        <hr class="my-5">

        <h3 class="mb-3">All Products from Your Shops</h3>

        @if($products->count())
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
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
            </div>

            {{ $products->appends(request()->query())->links() }}
        @else
            <p class="text-muted">No products found.</p>
        @endif
    </div>

    @include('shop-easy.shops._partials.add-shop-modal')
</x-layouts.app>

<script src="{{ asset('assets/js/modals.js') }}"></script>
