<x-modal id="addShopModal" title="Create New Shop" size="modal-lg">
    <form id="addShopForm" method="POST" action="">
        @csrf
        <div class="mb-2">
            <label for="shopName" class="form-label">Shop Name</label>
            <input type="text" class="form-control" id="shopName" name="name" required>
        </div>
        
        <div class="mb-2">
            <label for="shopDescription" class="form-label">Description</label>
            <textarea class="form-control" id="shopDescription" name="description" rows="3"></textarea>
        </div>
        
        <div class="mb-2">
            <label for="shopCategory" class="form-label">Category</label>
            <select class="form-select" id="shopCategory" name="category" required>
                <option value="">Select Category</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="food">Food & Beverages</option>
                <option value="books">Books</option>
            </select>
        </div>
        
        <div class="mb-2">
            <label for="shopAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="shopAddress" name="address" required>
        </div>
    </form>
    
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="addShopForm">Create Shop</button>
    </x-slot>
</x-modal>

<style>

    #addShopForm input{
        outline: none;
    }
    #addShopForm input[type="text"],
    #addShopForm textarea{
        padding: .5rem;
        font-size: 12px;
    }

</style>

<script src="{{ asset('assets/js/modals.js') }}"></script>
