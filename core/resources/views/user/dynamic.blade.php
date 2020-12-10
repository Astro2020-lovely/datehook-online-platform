@extends('user.layout.master')

@section('title', "$menu->title")

@section('headertext', "$menu->title")

@section('subheadertext',"$menu->sdetails")

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="container">
        <div class="page-content">
          {!!$menu->body!!}
        </div>
      </div>
    </div>
  </div>
@endsection
