@extends('admin.layout.master')

@push('styles')
<style media="screen">
  h3, h5 {
    margin: 0px;
  }
  .testimonial img {
    height: 100px;
    width: 100px;
    border-radius: 50%;
  }
  .fileinput .thumbnail > img {
    width: 100% !important;
  }
</style>
@endpush

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Story Section</h1>
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
                <form role="form" method="POST" action="{{route('admin.story.storyUpdate')}}">
                    {{ csrf_field() }}
                   <div class="form-group">
                            <label for="testm_title"><strong>Story Section Title</strong></label>
                                <input type="text" value="{{$gs->story_title}}" name="title" class="form-control">
                            </div>
                             <div class="form-group">
                                <label for="testm_details"><strong>Story Section Short Details</strong></label>
                               <input name="details" class="form-control" value="{{$gs->story_details}}">
                            </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success btn-block" >Update</button>
                    </div>
                </form>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h5 style="color:white;display:inline-block;">Stories</h5>
                    <button type="button" class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#addtest">
                      <i class="fa fa-plus"></i>
                      New Story
                    </button>
                  </div>
                  <div class="card-body">
                      @if (count($stories) == 0)
                        <h3 class="text-center"> NO STORY FOUND</h3>
                      @else
                        @foreach ($stories as $story)
                          @if ($loop->iteration % 3 == 1)
                          <div class="row"> {{-- .row start --}}
                          @endif
                          <div class="col-md-4">
                            <div class="card testimonial">
                              <div class="card-header bg-primary">
                                <h5 style="color:white">Story</h5>
                              </div>
                              <div class="card-body text-center">
                                <img src="{{asset('assets/user/interfaceControl/story/'.$story->image)}}" alt="">

                                <h3 style="margin-top:20px;">{{$story->couple_name}}</h3>
                                <p>
                                  {{$story->story}}
                                </p>
                              </div>
                              <div class="card-footer text-center">
                                <button style="color:white;" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edittest{{$story->id}}">
                                  <i class="fa fa-pencil-square"></i>
                                  Edit
                                </button>
                                <form action="{{route('admin.story.destroy')}}" method="POST" style="display: inline-block;">
                               {{csrf_field()}}
                               {{-- {{ method_field('DELETE') }} --}}
                               <input type="hidden" name="storyId" value="{{$story->id}}">
                               <button style="color:white;" type="submit" class="btn btn-danger btn-sm" name="button">
                                 <i class="fa fa-trash"></i>
                                 Delete
                               </button>
                             </form>

                              </div>
                            </div>
                          </div>
                          @if ($loop->iteration % 3 == 0)
                          </div> {{-- .row end --}}
                          <br>
                          @endif

                          <!-- Edit Modal -->
                          <div class="modal fade" id="edittest{{$story->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Edit Story {{$story->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form role="form" method="POST" action="{{route('admin.storydet.update',$story->id)}}" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                      <div class="form-group">
                                         <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail">
                                            <img src="{{ asset('assets/user/interfaceControl/story') }}/{{$story->image}}" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"> </div>
                                            <div>
                                              <span class="btn btn-success btn-file">
                                                <span class="fileinput-new"> Change Image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="photo"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                              </div>
                                            </div>
                                      </div>
                                  <div class="form-group">
                                      <label for="name">Couple Name</label>
                                      <input type="text" class="form-control" value="{{$story->couple_name}}" id="name" name="couple_name" >
                                  </div>
                                  <div class="form-group">
                                      <label for="comment" >Short Story</label>
                                      <input type="text" name="story" value="{{$story->story}}" class="form-control">
                                  </div>
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-lg btn-block btn-success" >Update</button>
                                      </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
  </main>

  <!-- Add Modal -->
  <div class="modal fade" id="addtest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add New Testimonial</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="{{route('admin.story.store')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
              <div class="form-group">
              <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail">
                <img src="http://via.placeholder.com/370X280" alt="" /> </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"> </div>
                <div>
                  <span class="btn btn-success btn-file">
                    <span class="fileinput-new"> Change Image </span>
                    <span class="fileinput-exists"> Change </span>
                    <input type="file" name="photo"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="name">Couple Name</label>
                  <input type="text" class="form-control" id="couple_name" name="couple_name" >
              </div>
              <div class="form-group">
                  <label for="company">Short Story</label>
                  <textarea class="form-control" id="stroy" name="story" rows="3" cols="80"></textarea>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-success btn-block" >Save</button>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
