<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="{{route('admin.category.store')}}" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              {{csrf_field()}}
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                     <strong>Status Name</strong>
                     <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="Enter Status Name" >
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
      </form>
    </div>
  </div>
</div>
