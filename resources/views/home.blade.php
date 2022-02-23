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
                                <p class="card-stats-title">Net Sales</p>
                                @if(Auth::user()->is_special == 1)
                                <h4 class="card-stats-number white-text">Ksh. {{ number_format($gross_sales) }}</h4>
                                @else
                                <h4 class="card-stats-number white-text">Ksh. {{ number_format($sales_per_store->total) }}</h4>
                                @endif
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
                       <div class="col l5"><div class="col s12 m6 l6 card-width">
                          <div class="card border-radius-6">
                            <div class="card-content center-align">
                              <i class="material-icons amber-text small-ico-bg mb-5">timeline</i>
                              <h4 class="m-0"><b>Ksh. {{ number_format($current_total_sales) }}</b></h4>
                              <p>Total Cash Sales</p>
                              @if($sales_perc_change > 0)
                              <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
                                {{ abs($sales_perc_change) }}%</p><br/>
                              @elseif($sales_perc_change < 0)
                              <p class="red-text  mt-3"><span></span><i class="material-icons vertical-align-middle">arrow_drop_down</i>
                                {{ abs($sales_perc_change) }}%</p><br/>
                              @else
                              <p class="orange-text  mt-3"><span></span><i class="material-icons vertical-align-middle">remove</i>
                                {{ abs($sales_perc_change) }}%</p><br/>
                              @endif
                                <p>from last month</p>
                            </div>
                          </div>
                        </div>
                        <div class="col s12 m6 l6 card-width">
                          <div class="card border-radius-6">
                            <div class="card-content center-align">
                              <i class="material-icons amber-text small-ico-bg mb-5">attach_money</i>
                              <h4 class="m-0"><b>Ksh. {{ number_format($todays_profit)}}</b></h4>
                              <p>Total Profit</p>
                              @if($profit_perc_change > 0)
                              <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
                                {{ round(abs($profit_perc_change), 2) }}%</p>
                              @elseif($profit_perc_change < 0)
                              <p class="red-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_down</i>
                                {{ round(abs($profit_perc_change), 2) }}%</p>
                              @else
                              <p class="orange-text  mt-3"><i class="material-icons vertical-align-middle">remove</i>
                                {{ round(abs($profit_perc_change), 2) }}%</p>
                              @endif
                              <br/><p>from yesterday</p>
                            </div>
                          </div>
                        </div></div>
                        
                        <div class="col l7">
                          <ul id="projects-collection" class="collection z-depth-1 animate fadeLeft">
                            <li class="collection-item avatar">
                                <i class="material-icons red circle">stars</i>
                                <h6 class="collection-header m-0">Top Selling Items</h6>
                                <p>All Times</p>
                            </li>
                            <table class="striped responsive-table ml-4 mr-4">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Code</th>
                                  <th>Name</th>
                                  <th>Total Amount</th>
                                </tr>
                              </thead>
                              <tbody>
                              @if(Auth::user()->is_special == 1)
                              @foreach ($top_selling_items_all as $key => $items)
                              <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $items->code }}</td>
                                <td>{{ $items->name }}</td>
                                <td>Ksh. {{ number_format($items->total) }}</td>
                              </tr>
                              @endforeach
                              @else
                              @foreach ($top_selling_items as $key => $items)
                              <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $items->code }}</td>
                                <td>{{ $items->name }}</td>
                                <td>Ksh. {{ number_format($items->total) }}</td>
                              </tr>
                              @endforeach
                              @endif
                              </tbody>
                            </table>
                          </ul>
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