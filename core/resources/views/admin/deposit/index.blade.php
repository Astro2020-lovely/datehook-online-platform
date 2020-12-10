@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i>
             @if (request()->path() == 'admin/deposit/acceptedRequests')
             Accepted
             @elseif (request()->path() == 'admin/deposit/rejectedRequests')
             Rejected
             @elseif (request()->path() == 'admin/deposit/pending')
             Pending
             @endif
             Deposit Request
           </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          @if (count($deposits) == 0)
          <div class="tile">
            <h2 class="text-center">NO
              @if (request()->path() == 'admin/deposit/pending')
              PENDING
              @elseif (request()->path() == 'admin/deposit/rejectedRequests')
              REJECTED
              @elseif (request()->path() == 'admin/deposit/acceptedRequests')
              ACCEPTED
              @endif
              DEPOSIT REQUEST FOUND</h2>
          </div>
          @else
          <div class="tile">
             <h3 class="tile-title pull-left">Deposit Request List</h3>
             <div class="table-responsive">
                <table class="table">
                   <thead>
                      <tr>
                         <th scope="col">#</th>
                         <th scope="col">Username</th>
                         <th scope="col">Gateway Name</th>
                         <th scope="col">Amount</th>
                         <th scope="col">Charge</th>
                         <th scope="col">Receipt</th>
                         @if (request()->path() != 'admin/deposit/acceptedRequests' && request()->path() != 'admin/deposit/rejectedRequests')
                         <th scope="col">Action</th>
                         @endif
                      </tr>
                   </thead>
                   <tbody>
                     @php
                       $i = 0;
                     @endphp
                     @foreach ($deposits as $deposit)
                     <tr>
                        <td data-label="Name">{{++$i}}</td>
                        <td data-label="Username"><a target="_blank" href="{{route('admin.userDetails', $deposit->user_id)}}">{{$deposit->user->username}}</a></td>
                        <td data-label="Email">{{$deposit->gateway->name}}</td>
                        <td data-label="Mobile">{{round($deposit->amount, $gs->dec_pt)}} {{$gs->base_curr_text}}</td>
                        <td data-label="Balance">{{round($deposit->charge, $gs->dec_pt)}} {{$gs->base_curr_text}}</td>
                        <td>
                          <button type="button" class="btn btn-outline-primary" onclick="showImageInModal(event, {{$deposit->id}})"><i class="fa fa-eye"></i> Show</button>
                        </td>
                        @if (request()->path() != 'admin/deposit/acceptedRequests' && request()->path() != 'admin/deposit/rejectedRequests')
                        <td data-label="Details">
                          <form style="display:inline-block;" class="" action="{{route('admin.deposit.accept')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="gid" value="{{$deposit->gateway->id}}">
                            <input type="hidden" name="dID" value="{{$deposit->id}}">
                            <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i>  Accept Request
                            </button>
                          </form>
                          <form style="display:inline-block;" class="" action="{{route('admin.deposit.rejectReq')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="dID" value="{{$deposit->id}}">
                            <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times"></i> Reject Request
                            </button>
                          </form>
                        </td>
                        @endif
                     </tr>
                     @endforeach
                   </tbody>
                </table>
             </div>
             <div class="">
               {{$deposits->links()}}
             </div>
          </div>
          @endif
        </div>
     </div>
  </main>

  @includeif('admin.deposit.partials.showImageModal')
@endsection

@push('scripts')
  <script>
    function showImageInModal(e, dID) {
      e.preventDefault();
      var fd = new FormData();
      fd.append('dID', dID);
      $.get(
        '{{route('admin.deposit.showReceipt')}}',
        {
          dID: dID,
        },
        function(data) {
          $('#showImageModal').modal('show');
          document.getElementById('adImage').src = '{{asset('assets/user/img/receipt_img')}}'+'/'+data.r_img;
          console.log(data);
        }
      );
    }
  </script>
@endpush
