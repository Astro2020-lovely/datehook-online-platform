 <!-- Modal -->
 <div class="modal fade" id="editModal{{$gateway->id}}" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="{{route('update.gateway')}}" method="post" enctype="multipart/form-data">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Edit Payment Gateway</h5>
           <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
             {{csrf_field()}}
             <input class="form-control abir_id" value="{{$gateway->id}}" type="hidden" name="id">
             <div class="form-group">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                   <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                      <img src="{{asset('assets/gateway/'.$gateway->id.'.jpg?dummy='.uniqid())}}" alt="*" />
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
                       <input type="text" value="{{$gateway->name}}" class="form-control" id="name" name="name" >
                    </div>
                    <div class="col-md-6">
                       <strong>Rate</strong>
                       <div class="input-group mb-3">
                         <div class="input-group-prepend">
                           <span class="input-group-text">1 USD=</span>
                         </div>
                         <input name="rate" value="{{$gateway->rate}}" type="text" class="form-control">
                         <div class="input-group-append">
                           <span class="input-group-text">{{$gs->base_curr_text}}</span>
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
                       <input value="{{$gateway->minamo}}" type="text" name="minamo" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                       <div class="input-group-append">
                         <span class="input-group-text" id="basic-addon2">{{$gs->base_curr_text}}</span>
                       </div>
                     </div>
                     <strong>Maximum Amount</strong>
                     <div class="input-group mb-3">
                       <input value="{{$gateway->maxamo}}" type="text" name="maxamo" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
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
                       <input value="{{$gateway->fixed_charge}}" type="text" name="chargefx" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                       <div class="input-group-append">
                         <span class="input-group-text" id="basic-addon2">{{$gs->base_curr_text}}</span>
                       </div>
                     </div>
                     <strong>Charge in Percentange</strong>
                     <div class="input-group mb-3">
                       <input value="{{$gateway->percent_charge}}" type="text" name="chargepc" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                       <div class="input-group-append">
                         <span class="input-group-text" id="basic-addon2">%</span>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             @if ($gateway->id > 899)
               <div class="form-group">
                  <strong>PAYMENT DETAILS</strong>
                  <textarea class="form-control" name="val3" rows="3" cols="80">{!! $gateway->val3 !!}</textarea>
               </div>
             @endif
             @if($gateway->id==101)
             <div class="form-group">
                <strong>PAYPAL BUSINESS EMAIL</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             @elseif($gateway->id==102)
             <div class="form-group">
                <strong>PM USD ACCOUNT</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>ALTERNATE PASSPHRASE</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==103)
             <div class="form-group">
                <strong>SECRET KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>PUBLISHABLE KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==104)
             <div class="form-group">
                <strong>Marchant Email</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>Secret KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==501)
             <div class="form-group">
                <strong>API KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>XPUB CODE</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==502)
             <div class="form-group">
                <strong>API KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>API PIN</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==503)
             <div class="form-group">
                <strong>API KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>API PIN</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==504)
             <div class="form-group">
                <strong>API KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>API PIN</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==505)
             <div class="form-group">
                <strong>Public  KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>Private KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==506)
             <div class="form-group">
                <strong>Public  KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>Private KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==507)
             <div class="form-group">
                <strong>Public  KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>Private KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==508)
             <div class="form-group">
                <strong>Public  KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>Private KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==509)
             <div class="form-group">
                <strong>Public  KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>Private KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==510)
             <div class="form-group">
                <strong>Public  KEY</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>Private KEY</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @elseif($gateway->id==513)
             <div class="form-group">
                <strong>API Key</strong>
                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
             </div>
             <div class="form-group">
                <strong>API ID</strong>
                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
             </div>
             @endif

             <div class="form-group">
                <strong>Status</strong>
                <select class="form-control" name="status">
                <option value="1" {{$gateway->status==1?'selected':''}}>Active</option>
                <option value="0" {{$gateway->status==0?'selected':''}}>Deactive</option>
                </select>
             </div>
         </div>
         <div class="modal-footer">
           <input type="submit" class="btn btn-primary" value="UPDATE">
         </div>
       </form>
     </div>
   </div>
 </div>
