@extends('layouts.main')

@section('content')
<div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- card stats start -->
                <div id="card-stats" class="pt-0">
                    <div class="row">
                        
                        <div class="col s12 m6 l4">
                            <div class="card animate fadeLeft">
                            <div class="card-content #c62828 red darken-3 white-text">
                                <p class="card-stats-title">Total Sales</p>
                                <h4 class="card-stats-number white-text">Ksh. {{ number_format($gross_sales) }}</h4>
                            </div>
                            <div class="card-action #c62828 red darken-3">
                                <div id="sales-compositebar" class="center-align"></div>
                            </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="card animate fadeRight">
                            <div class="card-content #880e4f pink darken-4 lighten-1 white-text">
                                <p class="card-stats-title">@if($total_profits > 0)<i class="material-icons">trending_up</i>@else<i class="material-icons">trending_down</i>@endif Total Profit</p>
                                <h4 class="card-stats-number white-text">Ksh. {{ number_format($total_profits) }}</h4>
                            </div>
                            <div class="card-action #880e4f pink darken-4">
                                <div id="profit-tristate" class="center-align"></div>
                            </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="card animate fadeRight">
                            <div class="card-content #004d40 teal darken-4 lighten-1 white-text">
                                <p class="card-stats-title"><i class="material-icons">add_shopping_cart</i>Total Product Entities</p>
                                <h4 class="card-stats-number white-text">{{$total_products}}</h4>
                            </div>
                            <div class="card-action #004d40 teal darken-4">
                                <div id="invoice-line" class="center-align"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l6 card-width">
                          <div class="card border-radius-6">
                            <div class="card-content center-align">
                              <i class="material-icons amber-text small-ico-bg mb-5">timeline</i>
                              <h4 class="m-0"><b>Ksh. {{ number_format($current_total_sales) }}</b></h4>
                              <p>Sales(this month)</p>
                              @if($sales_perc_change > 0)
                              <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
                                {{ abs($sales_perc_change) }}%</p>
                              @else
                              <p class="red-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_down</i>
                                {{ abs($sales_perc_change) }}%</p>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col s12 m6 l6 card-width">
                          <div class="card border-radius-6">
                            <div class="card-content center-align">
                              <i class="material-icons amber-text small-ico-bg mb-5">attach_money</i>
                              <h4 class="m-0"><b>Ksh. {{ number_format($todays_profit)}}</b></h4>
                              <p>Profit(today)</p>
                              @if($profit_perc_change > 0)
                              <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
                                {{ abs($profit_perc_change) }}%</p>
                              @else
                              <p class="red-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_down</i>
                                {{ abs($profit_perc_change) }}%</p>
                              @endif
                            </div>
                          </div>
                        </div>
                        
                        
                      </div>
                </div>
                <!--card stats end-->
                <!--chart dashboard start-->
   
                <!--chart dashboard end-->
                <!--work collections start-->
                <!--work collections end-->
                <!--card widgets start-->
                <!--card widgets end-->
                </div><!-- START RIGHT SIDEBAR NAV -->
              
<!-- END RIGHT SIDEBAR NAV -->
          </div>
          <div class="content-overlay"></div>
        </div>
      </div>
    </div>
@endsection