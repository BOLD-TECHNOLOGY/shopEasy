<x-modal id="editProductModal{{ $product->id }}" title="{{ $product->name }} Details" size="modal-lg">

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product: {{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div>
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div>
                    <label>Shop</label>
                    <input type="text" class="form-control" value="{{ $product->shop->name }}" readonly>
                </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
    </form>
    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
      @csrf @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>

</x-modal>
<script src="{{ asset('assets/js/modals.js') }}"></script>