<x-modal id="addProductModal" title="Create New Product" size="modal-lg">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <!-- Basic Info -->
                <div class="mb-3">
                    <label class="form-label">Product Name *</label>
                    <input name="name" class="form-control" placeholder="Product Name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Product description"></textarea>
                </div>

                <!-- Price -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Price *</label>
                            <input name="price" type="number" step="0.01" class="form-control" placeholder="0.00" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sale Price</label>
                            <input name="sale_price" type="number" step="0.01" class="form-control" placeholder="0.00">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="on_sale" class="form-check-input" id="on_sale">
                        <label class="form-check-label" for="on_sale">On Sale</label>
                    </div>
                </div>

                <!-- Inventory -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Stock Quantity</label>
                            <input name="stock" type="number" class="form-control" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input name="sku" class="form-control" placeholder="SKU-001">
                        </div>
                    </div>
                </div>

                <!-- Media -->
                <div class="mb-3">
                    <label class="form-label">Thumbnail Image</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label">Additional Images</label>
                    <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                </div>

                <!-- Attributes -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Color</label>
                            <input name="color" class="form-control" placeholder="Red, Blue, etc.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Size</label>
                            <input name="size" class="form-control" placeholder="S, M, L, XL">
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
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
                </div>

                <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <input name="tags" class="form-control" placeholder="tag1, tag2, tag3">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </form>
</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>