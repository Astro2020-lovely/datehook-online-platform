@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Ads Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          @if (count($ads) == 0)
            <div class="tile">
              <div class="">
                <h2 style="display:inline-block;">Ads List</h2>
                <a href="{{route('admin.ad.create')}}" class="float-right btn btn-outline-primary"><i class="fa fa-plus"></i> Add New</a>
                <p style="margin:0px;clear:both;"></p>
              </div>
              <hr>
              <h2 class="text-center">NO ADS FOUND</h2>
            </div>
          @else
            <div class="tile">
               <h3 class="tile-title pull-left">Ads List</h3>
               <a href="{{route('admin.ad.create')}}" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i> Add New</a>
               <p style="margin:0px;clear:both;"></p>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Ad Type</th>
                           <th scope="col">Ad Size</th>
                           <th scope="col">Views</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($ads as $ad)
                          <tr>
                             <td data-label="Name">
                               @if ($ad->type == 1)
                                 <h3>Banner</h3>
                               @elseif ($ad->type == 2)
                                 <h3>Script</h3>
                               @endif
                             </td>
                             <td data-label="Email">
                               @if ($ad->size == 1)
                                 <h6>300 X 250</h6>
                               @elseif ($ad->size == 2)
                                 <h6>728 X 90</h6>
                               @elseif ($ad->size == 3)
                                 <h6>300 X 600</h6>
                               @endif
                             </td>
                             <td data-label="Username">
                               @if (empty($ad->views))
                                 0
                               @else
                                 {{$ad->views}}
                               @endif
                             </td>
                             <td data-label="Mobile">
                               <button type="button" class="btn btn-outline-primary" onclick="showImageInModal(event, {{$ad->id}})"><i class="fa fa-eye"></i> Show</button>
                               <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#advertise-delete-data{{$ad->id}}"><i class="fa fa-trash"></i> Delete</button>
                             </td>
                          </tr>
                          <!--advertise delete modal-->
                          <div class="modal fade" id="advertise-delete-data{{$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Advertise Remove</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h3 class="text text-danger"><strong>Are Your Sure To Delete This Advertise ?</strong></h3>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <form style="display:inline-block;" action="{{route('admin.ad.delete')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="adID" value="{{$ad->id}}">
                                    <button type="submit" class="btn btn-danger" id="delete_confirm">Confirm Delete</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
          @endif
        </div>
     </div>
  </main>

  @includeif('admin.Ad.showImageModal')
@endsection

@push('scripts')
  <script>
    function showImageInModal(e, adID) {
      e.preventDefault();
      var fd = new FormData();
      fd.append('adID', adID);
      $.get(
        '{{route('admin.ad.showImage')}}',
        {
          adID: adID,
        },
        function(data) {
          $('#showImageModal').modal('show');
          if (data.script == null) {
            document.getElementById('adImage').style.display = 'block';
            document.getElementById('script').style.display = 'none';
            document.getElementById('adImage').src = '{{asset('assets/user/ad_images')}}'+'/'+data.image;
          }
          if (data.image == null) {
            document.getElementById('script').style.display = 'block';
            document.getElementById('adImage').style.display = 'none';
            document.getElementById('script').innerHTML = data.script;
          }
          console.log(data);
        }
      );
    }
  </script>
@endpush
