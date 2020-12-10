@extends('user.layout.master')
@section('content')

<div class="row my-5">
	<div class="col-md-12">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title text-center">{{$pt}}</h3>
			</div>
			<div class="panel-body text-center">
				<h6> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }}</span> BTC</h6>
				<h5>TO <span style="color: green"> {{ $wallet}}</span></h5>
				{!! $qrurl !!}
				<h4 style="font-weight:bold;">SCAN TO SEND</h4>
			</div>
		</div>
	</div>
</div>

@endsection
