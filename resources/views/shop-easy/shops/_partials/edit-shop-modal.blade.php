<x-modal id="editShopModal{{ $shop->id }}" title="Edit Shop" size="modal-lg">
    
    <form action="{{ route('shops.update', $shop) }}" method="POST">
        @csrf @method('PUT')
        <div class="modal-content">
            <div class="modal-header"><h5>Edit Shop</h5></div>
            <div class="modal-body">
                <input name="name" value="{{ $shop->name }}" required>
                <input name="category" value="{{ $shop->category }}">
                <textarea name="description">{{ $shop->description }}</textarea>
            </div>
            <div class="modal-footer">
                <button type="submit">Update</button>
            </div>
        </div>
    </form>

</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>