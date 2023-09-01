<div class="modal" id="myProductModal">
    <div class="modal-dialog modal-lg modal-style-addproduct">
        <div class=" modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Share a New Product</strong></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="product-form">
                    <input type="text" name="description" id="description" placeholder="Product description" required></input>
                    <input type="number" name="product-price" id="product-price" placeholder="Product price"></input>
                    <div class="file-upload-wrapper d-flex">
                        <label for="product-form" class="productadd-title-image">Product Image</label><br><br>
                        <input type="file" name="product-image" class="file-upload-input" accept="image/*">
                        <span class="file-upload-filename"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-danger bcolor-cinza-b productadd-cancel-btn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger bcolor-azul-claro productadd-save-btn" data-bs-dismiss="modal">Create</button>

            </div>
        </div>
    </div>
</div>