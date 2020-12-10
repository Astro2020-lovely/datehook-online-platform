@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Category Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title pull-left">Categories List</h3>
              <div class="pull-right icon-btn">
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                   <i class="fa fa-plus"></i> Add Category
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
                @if (count($cats) == 0)
                  <h2 class="text-center">NO CATEGORY FOUND</h2>
                @else
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">SL</th>
                           <th scope="col">Name</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                          @foreach ($cats as $key => $cat)
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$cat->name}}</td>
                               <td>
                                 <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{$cat->id}}">Edit</button>
                                 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delCon{{$cat->id}}">Delete</button>
                               </td>
                            </tr>
                            @includeif('admin.category.partials.edit')
                            @includeif('admin.category.partials.delete')
                          @endforeach

                     </tbody>
                  </table>
                @endif
              </div>

              <div class="text-center">
                {{$cats->links()}}
              </div>
           </div>
        </div>
     </div>
  </main>

  {{-- Gateway Add Modal --}}
  @includeif('admin.category.partials.add')
@endsection
