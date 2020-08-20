<div class="modal fade" id="update_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_category_form" onsubmit="return false" autocomplete="off">
          <div class="form-group">
            <label >Category Name </label>
            <input type="hidden" name="cid" id="cid" value="">
            <input type="text" class="form-control" name="update_category_name" id="update_category_name" placeholder="Enter Category Name" >
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label >Parent Category</label>
            <select class="form-control" name="parent_cat" id="parent_cat">
              

            </select>
            <!-- <small id="p_error" class="form-text text-muted"></small> -->
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