<x-modal id="addShopModal" title="Create New Shop" size="modal-lg">
    
    <form action="{{ route('shops.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header"><h5>Add Shop</h5></div>
            <div class="modal-body">
                <input name="name" placeholder="Shop Name" required>
                <input name="category" placeholder="Category">
                <textarea name="description" placeholder="Description"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit">Create</button>
            </div>
        </div>
    </form>
    
</x-modal>

