@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Deposit Log</h1>
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
              <h2 class="text-center">NO DEPOSITS FOUND</h2>
            </div>
          @else
            <div class="tile">
               <h3 class="tile-title pull-left">Deposit List</h3>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Serial</th>
                           <th scope="col">Username</th>
                           <th scope="col">Gateway Name</th>
                           <th scope="col">Amount</th>
                           <th scope="col">Charge</th>
                           <th scope="col">USD Amount</th>
                           <th scope="col">Status</th>
                           <th scope="col">Transaction ID</th>
                        </tr>
                     </thead>
                     <tbody>
                       @php
                         $i = 0;
                       @endphp
                       @foreach ($deposits as $deposit)
                         <tr>
                           <td>{{++$i}}</td>
                            <td data-label="Name"><a target="_blank" href="{{route('admin.userDetails', $deposit->user_id)}}">{{$deposit->user->username}}</a></td>
                            <td data-label="Email">{{($deposit->gateway->main_name)?$deposit->gateway->main_name:$deposit->gateway->name}}</td>
                            <td data-label="Username">{{round($deposit->amount, $gs->dec_pt)}} {{$gs->base_curr_text}}</td>
                            <td data-label="Mobile">{{round($deposit->charge, $gs->dec_pt)}} {{$gs->base_curr_text}}</td>
                            <td data-label="Balance">{{round($deposit->usd_amo, $gs->dec_pt)}} USD</td>
                            <td data-label="Balance">{{($deposit->status==0)?'incomplete':'complete'}}</td>
                            <td  data-label="Details">{{$deposit->trx}}</td>
                         </tr>
                       @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="text-center">
                 {{$deposits->links()}}
               </div>
            </div>
          @endif
        </div>
     </div>
  </main>
@endsection
