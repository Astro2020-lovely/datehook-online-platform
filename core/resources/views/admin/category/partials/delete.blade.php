<!-- Modal -->
<div class="modal fade" id="delCon{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">Are you sure you want to delete this Status?</h4>
        <div class="text-center">
          <form class="" action="{{route('admin.category.delete')}}" method="post" style="display:inline-block;">
            {{csrf_field()}}
            <input type="hidden" name="statusID" value="{{$cat->id}}">
            <button class="btn btn-success btn-sm" type="submit">Yes</button>
          </form>
          <button class="btn btn-danger btn-sm" type="button" name="button" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
