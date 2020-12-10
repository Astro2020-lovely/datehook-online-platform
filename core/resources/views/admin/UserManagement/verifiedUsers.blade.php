@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Verified Users Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          @if (count($verifiedUsers) == 0)
            <div class="tile">
              <h3 class="tile-title pull-left">Verified Users List</h3>
              <div class="pull-right icon-btn">
                <form method="GET" class="form-inline" action="{{route('admin.verUsersSearchResult')}}">
                   <input type="text" name="term" class="form-control" placeholder="Search by username">
                   <button class="btn btn-outline btn-circle  green" type="submit"><i
                      class="fa fa-search"></i></button>
                </form>
              </div>
              <p style="clear:both;margin:0px;"></p>
              <h2 class="text-center">NO VERIFIED USERS FOUND</h2>
            </div>
          @else
            <div class="tile">
               <h3 class="tile-title pull-left">Verified Users List</h3>
               <div class="pull-right icon-btn">
                 <form method="GET" class="form-inline" action="{{route('admin.verUsersSearchResult')}}">
                    <input type="text" name="term" class="form-control" placeholder="Search by username">
                    <button class="btn btn-outline btn-circle  green" type="submit"><i
                       class="fa fa-search"></i></button>
                 </form>
               </div>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Username</th>
                           <th scope="col">Mobile</th>
                           <th scope="col">Balance</th>
                           <th scope="col">Details</th>
                        </tr>
                     </thead>
                     <tbody>
                       @foreach ($verifiedUsers as $user)
                         <tr>
                            <td data-label="Name">{{$user->name}}</td>
                            <td data-label="Email">{{$user->email}}</td>
                            <td data-label="Username"><a target="_blank" href="{{route('admin.userDetails', $user->id)}}">{{$user->username}}</a></td>
                            <td data-label="Mobile">{{$user->phone}}</td>
                            <td data-label="Balance">{{$user->balance}} {{$gs->base_curr_text}}</td>
                            <td  data-label="Details">
                               <a href="{{route('admin.userDetails', $user->id)}}"
                                  class="btn btn-outline-primary ">
                               <i class="fa fa-eye"></i> View </a>
                            </td>
                         </tr>
                       @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="text-center">
                 {{$verifiedUsers->appends(['term' => $term])->links()}}
               </div>
            </div>
          @endif
        </div>
     </div>
  </main>
@endsection
