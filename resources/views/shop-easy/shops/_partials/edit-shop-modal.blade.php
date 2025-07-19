<x-modal id="editShopModal{{ $shop->id }}" title="Edit Shop" size="modal-lg">
    <form action="{{ route('shops.update', $shop) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Shop - {{ $shop->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="shopName{{ $shop->id }}" class="form-label">Shop Name</label>
                    <input type="text" name="name" id="shopName{{ $shop->id }}" class="form-control" value="{{ $shop->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="shopCategory{{ $shop->id }}" class="form-label">Category <small class="text-muted">(optional)</small></label>
                    <input type="text" name="category" id="shopCategory{{ $shop->id }}" class="form-control" value="{{ $shop->category }}">
                </div>

                <div class="mb-3">
                    <label for="shopDescription{{ $shop->id }}" class="form-label">Description</label>
                    <textarea name="description" id="shopDescription{{ $shop->id }}" class="form-control" rows="3">{{ $shop->description }}</textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Shop</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>
