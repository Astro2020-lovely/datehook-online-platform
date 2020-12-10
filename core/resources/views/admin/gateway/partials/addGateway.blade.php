<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="{{route('store.gateway')}}" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Payment Gateway</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              {{csrf_field()}}
              <div class="form-group">
                 <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                       <img src="http://via.placeholder.com/800X800" alt="*" />
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"> </div>
                    <div>
                       <span class="btn btn-success btn-file">
                       <span class="fileinput-new"> Change Logo </span>
                       <span class="fileinput-exists"> Change </span>
                       <input type="file" name="gateimg"> </span>
                       <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                    </div>
                 </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                     <strong>Name of Gateway</strong>
                     <input type="text" value="" class="form-control" id="name" name="name" >
                  </div>
                  <div class="col-md-6">
                     <strong>Rate</strong>
                     <div class="input-group mb-3">
                       <div class="input-group-prepend">
                         <span class="input-group-text">1 USD = </span>
                       </div>
                       <input name="rate" type="text" class="form-control">
                       <div class="input-group-append">
                         <span class="input-group-text"> {{ $gs->base_curr_text }}</span>
                       </div>
                     </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-primary text-white"><strong>Deposit Limit</strong></div>
                    <div class="card-body">
                      <strong>Minimum Amount</strong>
                      <div class="input-group mb-3">
                        <input type="text" name="minamo" class="form-control" placeholder="" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">{{$gs->base_curr_text}}</span>
                        </div>
                      </div>
                      <strong>Maximum Amount</strong>
                      <div class="input-group mb-3">
                        <input type="text" name="maxamo" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">{{$gs->base_curr_text}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-primary text-white"><strong>Deposit Charge</strong></div>
                    <div class="card-body">
                      <strong>Fixed Charge</strong>
                      <div class="input-group mb-3">
                        <input type="text" name="chargefx" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">{{$gs->base_curr_text}}</span>
                        </div>
                      </div>
                      <strong>Charge in Percentange</strong>
                      <div class="input-group mb-3">
                        <input type="text" name="chargepc" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                 <strong>Payment Details</strong>
                 <textarea name="val3" rows="3" cols="80" class="form-control"></textarea>
              </div>

              <div class="form-group">
                 <h5 for="status"><strong>Status</strong></h5>
                 <select class="form-control" name="status">
                 <option value="1">Active</option>
                 <option value="0">Deactive</option>
                 </select>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
      </form>
    </div>
  </div>
</div>
