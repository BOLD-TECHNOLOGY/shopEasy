<x-modal id="addProductModal" title="Create New Product" size="modal-lg">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">

        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Product</h5>
            </div>

            <div class="modal-body">
                <!-- Basic Info -->
                <input name="name" placeholder="Product Name" required>
                <textarea name="description" placeholder="Description"></textarea>

                <!-- Price -->
                <input name="price" type="number" step="0.01" placeholder="Price" required>
                <input name="sale_price" type="number" step="0.01" placeholder="Sale Price (optional)">
                <label>
                    <input type="checkbox" name="on_sale"> On Sale
                </label>

                <!-- Inventory -->
                <input name="stock" type="number" placeholder="Stock Quantity">
                <input name="sku" placeholder="SKU (Stock Keeping Unit)">

                <!-- Media -->
                <input type="file" name="thumbnail" accept="image/*" placeholder="Thumbnail Image">
                <input type="file" name="images[]" accept="image/*" multiple placeholder="Additional Images">

                <!-- Attributes -->
                <input name="color" placeholder="Color">
                <input name="size" placeholder="Size">

                <!-- Categorization (manual categories) -->
                <select name="category" class="form-select">
                    <option value="">Select Category</option>
                    <option value="electronics">Electronics</option>
                    <option value="fashion">Fashion</option>
                    <option value="home">Home & Furniture</option>
                    <option value="beauty">Beauty</option>
                    <option value="books">Books</option>
                    <option value="sports">Sports</option>
                    <option value="other">Other</option>
                </select>


                {{-- <select name="brand_id">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select> --}}

                <input name="tags" placeholder="Tags (comma separated)">
            </div>

            <div class="modal-footer">
                <button type="submit">Add Product</button>
            </div>
        </div>
    </form>
</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>
