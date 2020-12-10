@extends('admin.layout.master')

@push('styles')
<style media="screen">
  h3 {
    margin: 0px;
  }
</style>
@endpush

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> SOCIAL SETTING</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">

          <div class="tile">
            <div class="row">

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
                <div class="card">
                  <div class="card-body">
                    <form class="" action="{{route('admin.social.store')}}" method="post">
                      {{csrf_field()}}
                      <div class="row">
                        <div class="col-md-4">
                          <label for="">FONT AWESOME ICON CODE</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">fa fa-</span>
                            </div>
                            <input type="text" name="icon" class="form-control" placeholder="font awesome icon code" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                        </div>
                        <div class="col-md-8">
                          <label for="">URL</label>
                          <input type="text" name="title" class="form-control" placeholder="social link">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-info btn-block btn-lg">SUBMIT</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top:20px;">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h5 style="color:white;margin:0px;"><i class="fa fa-list"></i> SOCIAL LIST</h5>
                  </div>
                  <div class="card-body">
                    @if (count($socials) == 0)
                      <h3 class="text-center">NO SOCIAL LINKS FOUND</h3>
                    @else
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ICON</th>
                            <th scope="col">URL</th>
                            <th scope="col">DELETE</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $i=0;
                          @endphp
                          @foreach ($socials as $social)
                            <tr>
                              <th scope="row">{{++$i}}</th>
                              <td><i class="fa fa-{{$social->fontawesome_code}}"></i></td>
                              <td>{{$social->url}}</td>
                              <td>
                               <button type="button" class="btn btn-danger btn-sm delete_button" data-toggle="modal" data-target="#DelModal{{$social->id}}">
                               <i class="fa fa-times"></i> DELETE
                               </button>
                              </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="DelModal{{$social->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="text-center">Are you sure you want delete this?</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                    <form style="display:inline-block;" class="" action="{{route('admin.social.delete')}}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" name="socialID" value="{{$social->id}}">
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
     </div>
  </main>
@endsection
