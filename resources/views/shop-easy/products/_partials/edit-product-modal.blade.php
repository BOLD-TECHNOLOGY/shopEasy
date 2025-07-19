<x-modal id="editProductModal{{ $product->id }}" title="{{ $product->name }} Details" size="modal-lg">
    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product: {{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <!-- Name -->
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>

                <!-- Slug -->
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">

                <!-- Description -->
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>

                <!-- Price -->
                <label>Price</label>
                <input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}" required>

                <!-- Sale Price & On Sale -->
                <label>Sale Price</label>
                <input type="number" name="sale_price" step="0.01" class="form-control" value="{{ $product->sale_price }}">
                <label><input type="checkbox" name="on_sale" {{ $product->on_sale ? 'checked' : '' }}> On Sale</label>

                <!-- Stock & SKU -->
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                <label>SKU</label>
                <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">

                <!-- Category -->
                <label>Category</label>
                <select name="category" class="form-select">
                    <option value="">Select Category</option>
                    @foreach (['electronics', 'fashion', 'home', 'beauty', 'books', 'sports', 'other'] as $cat)
                        <option value="{{ $cat }}" @selected($product->category === $cat)>{{ ucfirst($cat) }}</option>
                    @endforeach
                </select>

                <!-- Color & Size -->
                <label>Color</label>
                <input type="text" name="color" class="form-control" value="{{ $product->color }}">
                <label>Size</label>
                <input type="text" name="size" class="form-control" value="{{ $product->size }}">

                <!-- Thumbnail -->
                <label>Thumbnail (Image URL or File)</label>
                <input type="text" name="thumbnail" class="form-control" value="{{ $product->thumbnail }}">
                {{-- Optional file input --}}
                {{-- <input type="file" name="thumbnail_file" class="form-control"> --}}

                <!-- Tags -->
                <label>Tags (comma separated)</label>
                <input type="text" name="tags" class="form-control" value="{{ $product->tags }}">

                <!-- SEO -->
                <label>Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control">{{ $product->meta_description }}</textarea>

                <!-- Visibility -->
                <label><input type="checkbox" name="is_active" {{ $product->is_active ? 'checked' : '' }}> Active</label>
                <label><input type="checkbox" name="is_featured" {{ $product->is_featured ? 'checked' : '' }}> Featured</label>

                <!-- Shop (Read-only) -->
                <label>Shop</label>
                <input type="text" class="form-control" value="{{ $product->shop->name }}" readonly>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </form>

    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-2">Delete</button>
    </form>
</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>
