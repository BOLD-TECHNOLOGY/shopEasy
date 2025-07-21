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
                <div class="mb-3">
                    <label class="form-label">Product Name *</label>
                    <input name="name" class="form-control" placeholder="Product Name" required value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Stock Quantity</label>
                            <input name="stock" type="number" class="form-control" placeholder="0" value="{{ old('stock') }}">
                            @error('stock')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input name="sku" class="form-control" placeholder="SKU-001" value="{{ old('sku') }}">
                            @error('sku')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Product description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Price *</label>
                            <input name="price" type="number" step="0.01" class="form-control" placeholder="0.00" required value="{{ old('price') }}">
                            @error('price')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sale Price</label>
                            <input name="sale_price" type="number" step="0.01" class="form-control" placeholder="0.00" value="{{ old('sale_price') }}">
                            @error('sale_price')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <!-- Hidden input to ensure a value is always sent -->
                    <input type="hidden" name="on_sale" value="0">
                    <div class="form-check">
                        <input type="checkbox" name="on_sale" value="1" class="form-check-input" id="on_sale" {{ old('on_sale') ? 'checked' : '' }}>
                        <label class="form-check-label" for="on_sale">On Sale</label>
                    </div>
                    @error('on_sale')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Stock Quantity</label>
                            <input name="stock" type="number" class="form-control" placeholder="0" value="{{ old('stock') }}">
                            @error('stock')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input name="sku" class="form-control" placeholder="SKU-001" value="{{ old('sku') }}">
                            @error('sku')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Thumbnail Image</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                    <small class="text-muted">Maximum file size: 1MB</small>
                    @error('thumbnail')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Additional Images</label>
                    <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">Maximum file size per image: 3MB</small>
                    @error('images.*')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Color</label>
                            <input name="color" class="form-control" placeholder="Red, Blue, etc." value="{{ old('color') }}">
                            @error('color')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Size</label>
                            <input name="size" class="form-control" placeholder="S, M, L, XL" value="{{ old('size') }}">
                            @error('size')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="">Select Category</option>
                        <option value="electronics" {{ old('category') == 'electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="fashion" {{ old('category') == 'fashion' ? 'selected' : '' }}>Fashion</option>
                        <option value="home" {{ old('category') == 'home' ? 'selected' : '' }}>Home & Furniture</option>
                        <option value="beauty" {{ old('category') == 'beauty' ? 'selected' : '' }}>Beauty</option>
                        <option value="books" {{ old('category') == 'books' ? 'selected' : '' }}>Books</option>
                        <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                        <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('category')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <input name="tags" class="form-control" placeholder="tag1, tag2, tag3" value="{{ old('tags') }}">
                    @error('tags')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Additional checkboxes for other boolean fields -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-check">
                                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="hidden" name="is_featured" value="0">
                            <div class="form-check">
                                <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Featured</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="in_stock" value="0">
                        <div class="form-check">
                            <input type="checkbox" name="in_stock" value="1" class="form-check-input" id="in_stock" {{ old('in_stock', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="in_stock">In Stock</label>
                        </div>
                        @error('in_stock')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
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