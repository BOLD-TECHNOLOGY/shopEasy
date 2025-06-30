<div class="modal fade d_modal" id="d_newShopModal" tabindex="-1" aria-labelledby="d_newShopModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg d_modal-dialog">
        <div class="modal-content d_modal-content">
            <div class="modal-header d_modal-header">
                <h5 class="modal-title d_modal-title" id="d_newShopModalLabel">
                    Create New Shop
                </h5>
                <button type="button" class="btn-close d_modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d_modal-body">
                <form method="POST" action="{{ route('shops.store') }}" id="d_shopForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d_form-group">
                                <label for="d_shopName" class="d_form-label">
                                    Shop Name *
                                </label>
                                <input type="text" class="form-control d_form-control" id="d_shopName" name="shop_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d_form-group">
                                <label for="d_shopCategory" class="d_form-label">
                                    Category *
                                </label>
                                <select class="form-select d_form-control d_form-select" id="d_shopCategory" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="clothing">Clothing & Fashion</option>
                                    <option value="food">Food & Beverage</option>
                                    <option value="books">Books & Stationery</option>
                                    <option value="home">Home & Garden</option>
                                    <option value="beauty">Beauty & Personal Care</option>
                                    <option value="sports">Sports & Outdoors</option>
                                    <option value="automotive">Automotive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d_form-group">
                        <label for="d_shopDescription" class="d_form-label">
                            Description
                        </label>
                        <textarea class="form-control d_form-control" id="d_shopDescription" name="description" rows="3" placeholder="Tell us about your shop..."></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d_form-group">
                                <label for="d_shopEmail" class="d_form-label">
                                    Contact Email
                                </label>
                                <input type="email" class="form-control d_form-control" id="d_shopEmail" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d_form-group">
                                <label for="d_shopPhone" class="d_form-label">
                                    Phone Number
                                </label>
                                <input type="tel" class="form-control d_form-control" id="d_shopPhone" name="phone">
                            </div>
                        </div>
                    </div>
                    
                    <div class="d_form-group">
                        <label for="d_shopAddress" class="d_form-label">
                            Address
                        </label>
                        <textarea class="form-control d_form-control" id="d_shopAddress" name="address" rows="2" placeholder="Enter shop address..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer d_modal-footer">
                <button type="button" class="btn d_btn d_btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn d_btn d_btn-primary" onclick="d_submitShopForm()">
                    Create Shop
                </button>
            </div>
        </div>
    </div>
</div>