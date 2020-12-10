@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Transaction Log</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          @if (count($trs) == 0)
            <div class="tile">
              <h2 class="text-center">NO DEPOSITS FOUND</h2>
            </div>
          @else
            <div class="tile">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Serial</th>
                           <th scope="col">Username</th>
                           <th scope="col">Details</th>
                           <th scope="col">Amount</th>
                           <th scope="col">Transaction ID</th>
                           <th scope="col">After Balance</th>
                        </tr>
                     </thead>
                     <tbody>
                       @php
                         $i = 0;
                       @endphp
                       @foreach ($trs as $tr)
                         <tr>
                           <td>{{++$i}}</td>
                            <td data-label="Name"><a target="_blank" href="{{route('admin.userDetails', $tr->user_id)}}">{{$tr->user->username}}</a></td>
                            <td data-label="Email">{{$tr->details}}</td>
                            <td data-label="Username">{{$tr->amount}} {{$gs->base_curr_text}}</td>
                            <td data-label="Mobile">{{$tr->trx_id}} {{$gs->base_curr_text}}</td>
                            <td data-label="Balance">{{$tr->after_balance}} {{$gs->base_curr_text}}</td>
                         </tr>
                       @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="text-center">
                 {{$trs->links()}}
               </div>
            </div>
          @endif
        </div>
     </div>
  </main>
@endsection
