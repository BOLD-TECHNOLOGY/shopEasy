<x-modal id="editProductModal{{ $product->id }}" title="Edit Product" size="modal-lg">
    <form action="{{ route('products.update', $product) }}" method="POST">
      @csrf @method('PUT')

      <div class="modal-content">
        <div class="modal-header"><h5>Edit Product</h5></div>
        <div class="modal-body">
            <input name="name" value="{{ $product->name }}" required>
            <textarea name="description">{{ $product->description }}</textarea>
            <input name="price" type="number" step="0.01" value="{{ $product->price }}" required>
        </div>
        <div class="modal-footer">
            <button type="submit">Update</button>
        </div>
      </div>
    </form>
    
</x-modal>
<script src="{{ asset('assets/js/modals.js') }}"></script>