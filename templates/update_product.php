<div class="modal fade" id="update_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id="update_product_form" onsubmit="return false">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Date</label>
          <input type="hidden" name="pid" id="pid" value="">
          <input type="text" class="form-control" id="added_date" name="added_date" value="<?php echo date("y-m-d")?>" readonly>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Product Name</label>
          <input type="text" class="form-control" id="update_product_name" name="update_product_name"placeholder="Enter Product Name">
          <small id="p_name_error" class="form-text text-muted"></small>
        </div>
      </div>
      <div class="form-group">
        <label >Select Category</label>
            <select class="form-control" name="select_cat" id="select_cat">
              

            </select>
      </div>
      <div class="form-group">
        <label >Select Brand</label>
            <select class="form-control" name="select_brand" id="select_brand">
              

            </select>
      </div>
      <div class="form-group">
          <label >Product Price</label>
          <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" >
          <small id="price_error" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
          <label >Product Quantity</label>
          <input type="text" class="form-control" name="product_qty" id="product_qty" placeholder="Enter Product Quantity" >
          <small id="p_qty_error" class="form-text text-muted"></small>
      </div>
      
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>