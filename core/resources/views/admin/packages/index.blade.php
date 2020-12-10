@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Package Setting</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title pull-left">Subscription Packcages</h3>

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
                @if (count($packages) == 0)
                  <h2 class="text-center">NO PACKAGES FOUND</h2>
                @else
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">SL</th>
                           <th scope="col">Title</th>
                           <th scope="col">Features</th>
                           <th scope="col">Price</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                          @foreach ($packages as $key => $package)
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{!!$package->title!!}</td>
                               <td>{!!$package->s_desc!!}</td>
                               <td>{!!$package->price!!}</td>
                               <td>
                                 @if ($package->status == 1)
                                   <button type="button" class="btn btn-success btn-sm">Active</button>
                                 @else
                                   <button type="button" class="btn btn-danger btn-sm">Deactive</button>
                                 @endif
                               </td>
                               <td>
                                 <button type="button" class="btn btn-warning btn-outline-warning btn-sm" data-toggle="modal" data-target="#editModal{{$package->id}}">Edit</button>
                               </td>
                            </tr>
                            @includeif('admin.packages.partials.edit')
                          @endforeach

                     </tbody>
                  </table>
                @endif
              </div>
           </div>
        </div>
     </div>
  </main>


@endsection
