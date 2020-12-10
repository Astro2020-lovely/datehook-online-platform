@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Gateway Setting</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title pull-left">Payment Gateways</h3>
              <div class="pull-right icon-btn">
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                   <i class="fa fa-plus"></i> Add Gateway
                 </button>
              </div>
              <p style="clear:both;margin:0px;"></p>
              <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              </div>
              <div class="table-responsive">
                 <table class="table">
                    <thead>
                       <tr>
                          <th scope="col">SL</th>
                          <th scope="col">Gateway Name</th>
                          <th scope="col">Name for User</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                       </tr>
                    </thead>
                    <tbody>
                       @php
                         $i=0;
                       @endphp
                       @foreach ($gateways as $gateway)
                         <tr>
                            <td data-label="Name">{{++$i}}</td>
                            <td>{{ $gateway->main_name }}</td>
                            <td>{{ $gateway->name }}</td>
                            <td>
                              @if($gateway->status == 1)
                              <a class="btn btn-success text-white">Active </a>
                              @else
                              <a class="btn btn-danger text-white">Deactve </a>
                              @endif
                            </td>
                            <td>
                              <button class="btn btn-outline-warning"
                              data-toggle="modal" data-target="#editModal{{$gateway->id}}"
                              data-act="Edit">
                              Edit </button>
                            </td>
                         </tr>
                         @includeif('admin.gateway.partials.edit')
                       @endforeach
                    </tbody>
                 </table>
              </div>
           </div>
        </div>
     </div>
  </main>

  {{-- Gateway Add Modal --}}
  @includeif('admin.gateway.partials.addGateway')
@endsection
