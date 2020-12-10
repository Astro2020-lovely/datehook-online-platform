@extends('layouts.user')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">{{$pt}}</h3>
			</div>
			<div class="panel-body">
				<div  class="col-md-6 col-md-offset-3 text-center">
                    <form  class="contact-form" method="POST" action="{{ route('deposit.confirm') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                        <div class="panel">
                            <div class="panel-body">
                                <ul class="list-group text-center">
                                    <li class="list-group-item"><img src="{{asset('assets/images/gateway')}}/{{$data->gateway_id}}.jpg" style="max-width:100px; max-height:100px; margin:0 auto;"/></li>
                                    <li class="list-group-item">Amount: <strong>{{$data->amount}} </strong>{{$gnl->cur}}</li>
                                    <li class="list-group-item">Charge: <strong>{{$data->charge}} </strong>{{$gnl->cur}}</li>
                                    <li class="list-group-item">Payable: <strong>{{$data->charge + $data->amount}} </strong>{{$gnl->cur}}</li>
                                    <li class="list-group-item">In USD: <strong>${{$data->usd_amo}}</strong></li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-success btn-block">
                                    Pay Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
