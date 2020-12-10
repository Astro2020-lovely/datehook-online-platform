@extends('user.layout.master')

@push('styles')
  <style media="screen">
  .package-container {
    padding: 50px 0px;
  }
  .package-container h2 {
    margin-bottom: 20px;
    font-size: 40px;
  }
  .package-desc {
    min-height: 220px;
  }
  h5.card-title {
    margin: 0px;
    text-align: center;
  }
  </style>
@endpush

@section('headertext', 'Subscription Packages')


@section('content')
  <div class="">
    <div class="container package-container">
      <div class="row">
        <div class="col-md-12">
            @if (Auth::user()->package == 1)
              <div class="info">
                You have already bought <strong>Gold</strong> package.
              </div>
            @elseif (Auth::user()->package == 3)
              <div class="info">
                You have already bought <strong>Diamond</strong> package.
              </div>
            @elseif (Auth::user()->package == 4)
              <div class="info">
                You have already bought <strong>Platinum</strong> package.
              </div>
            @else
              <div class="info">
                You didn't buy any package.
              </div>
            @endif
            @foreach ($packages as $package)
              @if ($loop->iteration % 3 == 1)
              <div class="row"> {{-- .row start --}}
              @endif
              <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading base-bg">
                    <h3 style="font-size:30px;" class="text-center white-txt">{{$package->title}}</h3>
                  </div>
                  <div class="panel-body package-desc">
                    <p class="card-text">
                      {!!$package->s_desc!!}
                    </p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Price: </strong>{{$package->price}} {{$gs->base_curr_text}}</li>
                  </ul>
                  <div class="card-body">
                    <div class="text-center">
                      <button type="button" class="btn base-bg white-txt btn-block" onclick="buy({{$package->id}});">Buy</button>
                    </div>
                  </div>
                </div>
              </div>
              @if ($loop->iteration % 3 == 0)
              </div> {{-- .row end --}}
              @endif
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function buy(id) {
    swal({
      title: "Confirmation",
      text: "Are you sure, you want to buy this package?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willBuy) => {
      if (willBuy) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('packid', id);
        $.ajax({
          url: '{{route('package.buy')}}',
          type: 'POST',
          data: fd,
          contentType: false,
          processData: false,
          success: function(data) {
            console.log(data);
            if (data == "success") {
              swal("You have bought the package!", {
                icon: "success",
              });
            }
            if (data == "b_short") {
              swal("You dont have enough balance to buy this package!", {
                icon: "error",
              });
            }
          }
        })
      }
    });
  }
</script>
@endpush
