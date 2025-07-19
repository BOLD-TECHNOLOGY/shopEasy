<x-modal id="addShopModal" title="Create New Shop" size="modal-lg">
    <form action="{{ route('shops.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Shop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="shopName" class="form-label">Shop Name</label>
                    <input type="text" id="shopName" name="name" class="form-control" placeholder="Enter shop name" required>
                </div>

                <div class="mb-3">
                    <label for="shopCategory" class="form-label">Category <small class="text-muted">(optional)</small></label>
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
                    <label for="shopDescription" class="form-label">Description</label>
                    <textarea id="shopDescription" name="description" class="form-control" rows="3" placeholder="Describe your shop"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create Shop</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>
