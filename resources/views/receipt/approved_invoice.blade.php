
<!DOCTYPE html>
<!--
Template Name: Materialize - Material Design Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
Renew Support: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>{{ $sales->first()->receipt_code }}</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns  app-page " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
   
    <!-- END: Header-->
    



    <!-- BEGIN: SideNav-->
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <!-- app invoice View Page -->
            <section class="invoice-view-wrapper section">
            <div class="row">
                <!-- invoice view page -->
                <div class="col xl10 m8 s12">
                    <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                        <i class="material-icons">arrow_back</i>
                    </a>
                <div class="card">
                    <div class="card-content invoice-print-area">
                    <!-- header section -->
                    
                    <div class="row invoice-date-number">
                        <div class="col xl4 s12">
                        <span class="invoice-number mr-1">Invoice No.</span>
                        <span>{{ $sales->first()->receipt_code }}</span>
                        </div>
                        <div class="col xl10 s12">
                        <div class="invoice-date display-flex align-items-center flex-wrap">
                            <div class="mr-3">
                            <small>Date:</small>
                            <span>{{ $sales->first()->trans_date }}</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- logo and title -->
                    <div class="row mt-3 invoice-logo-title">
                        <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                        <img src="{{ asset('images/dcl_logo.png')}}" alt="logo" height="46" width="164">
                        </div>
                        <div class="col m6 s12 pull-m6">
                        <h4 class="indigo-text">Invoice</h4>
                            <span class="badge badge pill green">Approved</span>
                        </div>
                    </div>
                    
                    <div class="divider mb-3 mt-3"></div>
                    <!-- product details table-->
                    <div class="invoice-product-details">
                        <table class="striped responsive-table">
                        <thead>
                            <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Cost</th>
                            <th>Qty</th>
                            <th class="right-align">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->item_code }}</td>
                                <td>{{$sale->name}}</td>
                                <td>{{$sale->description}}</td>
                                <td>{{ number_format($sale->price,2) }}</td>
                                <td>{{$sale->qty}}</td>
                                <td class="indigo-text right-align">{{ number_format($sale->total, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- invoice subtotal -->
                    <div class="invoice-subtotal">
                        <div class="row">
                        <div class="col m5 s12">
                            <p>Thanks for shopping with us.</p>
                        </div>
                        <div class="col xl4 m7 s12 offset-xl3">
                            <ul>
                            <li class="display-flex justify-content-between">
                                <span class="invoice-subtotal-title">Sub Total</span>
                                <h6 class="invoice-subtotal-value">Ksh.{{ number_format($sales->first()->sub_total, 2) }}</h6>
                            </li>
                            <li class="display-flex justify-content-between">
                                <span class="invoice-subtotal-title">Net Tax</span>
                                <h6 class="invoice-subtotal-value">Ksh.{{ number_format($sales->first()->net_tax, 2) }}</h6>
                            </li>
                            <li class="display-flex justify-content-between">
                                <span class="invoice-subtotal-title">Total Amount</span>
                                <h6 class="invoice-subtotal-value red-text">Ksh.{{ number_format($sales->first()->total_amount, 2) }}</h6>
                            </li>   
                            </ul>
                        </div>
                        </div>


                    </div>
                    </div>
                </div>
                </div>
                <!-- invoice action  -->
            
            </div>
            </section><!-- START RIGHT SIDEBAR NAV -->

            
            <button onclick="window.print()" class="btn waves-effect waves-light btn indigo" type="submit" name="action">Print
                <i class="material-icons right">print</i>
            </button>
            <a class="waves-effect waves-light btn red modal-trigger" href="#modal1">Invoice Payment</a>
            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                <h4>{{ $sales->first()->receipt_code }}</h4>
                <p class="red-text">Please provide the amount paid</p>
                <div class="row">
                    <form action="{{ route('inv_pay', $sales->first()->inv_id )}}" method="POST">
                        @csrf
                        <div class="col l8">
                            <label for="">Total Amount Paid</label>
                            <input type="text" placeholder="0.00" value="" name="amount_paid">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn green waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                    

                </div>
                </div>
            </div>
<!-- END RIGHT SIDEBAR NAV -->
          </div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->

    <!-- Theme Customizer -->


<!--/ Theme Customizer -->


    
    <!-- BEGIN: Footer-->

    

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../../../app-assets/js/plugins.js"></script>

    <script>
        $(document).ready(function(){
            $('.print').click(function(){
                window.print();
            })
            
            $('.modal').modal();

            
        })
    </script>
    <script src="../../../app-assets/js/search.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/app-invoice.js"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>