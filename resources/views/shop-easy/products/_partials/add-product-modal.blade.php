<x-modal id="addProductModal" title="Create New Product" size="modal-lg">
    <form action="{{ route('products.store') }}" method="POST">
      @csrf
      <input type="hidden" name="shop_id" value="{{ $shop->id }}">

      <div class="modal-content">
        <div class="modal-header"><h5>Add Product</h5></div>
        <div class="modal-body">
            <input name="name" placeholder="Product Name" required>
            <textarea name="description" placeholder="Description"></textarea>
            <input name="price" type="number" step="0.01" placeholder="Price" required>
        </div>
        <div class="modal-footer">
            <button type="submit">Add</button>
        </div>
      </div>
    </form>

</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>
