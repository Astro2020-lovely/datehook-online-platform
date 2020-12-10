@extends('admin.layout.master')

@push('styles')
  <style media="screen">
    form {
      width:100%;
      padding:0px 30px;
    }
  </style>
@endpush

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
        <div class="tile">
          <div class="">
            <h2 style="display:inline-block">Create Ad</h2>
            <a href="{{route('admin.ad.index')}}" class="float-right btn btn-outline-primary">View All Ads</a>
            <p style="clear:both;margin:0px;"></p>
          </div>
          <hr>

          <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger" style="width:100%;margin:0px 30px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.ad.store')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
               <div class="form-group">
                  <label for="add_type"> Select Advertisement Type</label>
                  <select name="type" class="form-control" id="add_type" onchange="changeForm(this.value)">
                     {{-- <option selected="">Select Advertise Type</option> --}}
                     <option value="1">Banner</option>
                     <option value="2">Script</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="add_size"> Select Advertisement Size</label>
                  <select name="size" class="form-control" id="add_size">
                     {{-- <option>Select Size</option> --}}
                     <option value="1">300x250</option>
                     <option value="2">728x90</option>
                     <option value="3">300x600</option>
                  </select>
               </div>
               <div id="urlBannerDiv">
                  <div class="form-group"><label for="redirect_url"> Redirect Url</label><input type="text" name="redirect_url" placeholder="http://thesoftking.com" class="form-control"></div>
                  <div class="form-group"><label for="add_picture">Banner</label><br /><input type="file" name="banner"></div>
               </div>
               <div id="scriptDiv" style="display:none;">
                 <div class="form-group">
                   <label for="script"> Script</label>
                   <textarea name="script" id="script" cols="30" rows="10" class="form-control" placeholder="Script will be here"></textarea>
                 </div>
               </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-success" value="SAVE AD">
               </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </main>
@endsection

@push('scripts')
  <script>
    function changeForm(adType) {
      console.log(adType);
      if(adType == 1) {
        document.getElementById('scriptDiv').style.display = 'none';
        document.getElementById('urlBannerDiv').style.display = 'block';
      } else {
        document.getElementById('scriptDiv').style.display = 'block';
        document.getElementById('urlBannerDiv').style.display = 'none';
      }
    }
  </script>
@endpush
