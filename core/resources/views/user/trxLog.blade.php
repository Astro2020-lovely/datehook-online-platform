@extends('user.layout.master')


@push('styles')
  <style media="screen">
    .live-token-sale {
        padding: 50px 0px;
    }
    .caption {
      margin-bottom: 30px;
    }
  </style>
@endpush

@section('headertext', 'Transaction Log')

@section('content')
  <!-- live token sale area start -->
  <section class="" style="padding: 50px 0px;">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="tab-content"> <!-- tab content start-->
                      <div class="tab-pane container active" id="all_tab">
                          <div class="row">
                            @if (count($trs) == 0)
                              <div class="col-md-12" style="text-align:center;display:block;">
                                <h3>NO LOG FOUND</h3>
                              </div>
                            @else
                            <div class="col-md-12 text-center">
                              <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th scope="col" class="coin_name_th">SERIAL</th>
                                              <th scope="col" class="start_price_th" >DETAILS</th>
                                              <th scope="col" class="founding_target_th" >AMOUNT</th>
                                              <th scope="col" class="founding_target_th" >TRANSACTION ID</th>
                                              <th scope="col" class="ico_date_th" >AFTER BALANCE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $i = 0;
                                          @endphp
                                          @foreach ($trs as $tr)
                                            <tr class="traending_ico_tr">
                                                <td data-label="coin_name" class="coin_name">
                                                  {{++$i}}
                                                </td>
                                                <td data-label="ratings" class="ratings_td">
                                                  {{$tr->details}}
                                                </td>
                                                <td data-label="founding_target">
                                                    {{$tr->amount}} {{$gs->base_curr_text}}
                                                </td>
                                                <td data-label="ico_date">
                                                  {{$tr->trx_id}}
                                                </td>
                                                <td data-label="ico_date">
                                                  {{round($tr->after_balance, $gs->dec_pt)}} {{$gs->base_curr_text}}
                                                </td>

                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                              </div>
                            </div>

                                <div class="text-center">
                                  {{$trs->links()}}
                                </div>
                            @endif
                          </div>
                      </div>
                  </div><!-- tab content end-->
              </div>
          </div>
      </div>
  </section>
  <!-- live token sale area end -->
@endsection
