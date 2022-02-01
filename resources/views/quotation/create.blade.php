@extends('layouts.main')

@section('css')

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">
<link rel="stylesheet" href="../../../app-assets/vendors/select2/select2.min.css" type="text/css">
<link rel="stylesheet" href="../../../app-assets/vendors/select2/select2-materialize.css" type="text/css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/materialize.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/style.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/form-select2.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-contacts.css">

@section('content')


<div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- Add new contact popup -->
                    <div class="contact-overlay"></div>
                    <div style="bottom: 54px; right: 19px;" class="fixed-action-btn direction-top">
                        <a class="btn-floating btn-large primary-text gradient-shadow contact-sidebar-trigger" href="#modal1">
                            <i class="material-icons">person_add</i>
                        </a>
                    </div>
                    <!-- Add new contact popup Ends-->

                    <!-- Sidebar Area Starts -->
                    
                    <!-- Sidebar Area Ends -->

                    <!-- Content Area Starts -->
                    <form action="{{ route('store_quotations')}}" method="POST">
                        @csrf
                    <div class="content-area content-center">
                        <div class="app-wrapper">
                            <div class="datatable-search">
                                <div class="card">
                                    <div class="card-content">
                                        <h3>TOTAL <b class="total blue-text">0.00</b></h3>
                                        <div class="row">
                                            <div class="col l3">
                                                <label for="">Clients Name</label>
                                                @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                    @foreach($errors->all() as $error)
                                                    <li class="text-red">{{ $error }}</li>
                                                    @endforeach
                                                    </ul>
                                                </div>

                                                @endif
                                                <select name="client_id" required="" class="app-filter">
                                                    <option selected disabled="">SELECT</option>
                                                    @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" placeholder="0.00" hidden value="" name="net_total" class="net_total">
                                            <div class="col l3">
                                                <label for="">Sub Total</label>
                                                <input type="text" placeholder="" readonly="" value="" name="sub_total" class="sub_total">
                                            </div>
                                            <div class="col l3">
                                                <label for="">Net Tax</label>
                                                <input type="text" placeholder="" readonly="" value="" name="tax" class="tax">
                                            </div>
                                            <div class="col l3">
                                                <label for="">Quotation Code</label>
                                                <input type="text" placeholder="0.00" readonly value="{{ $orderCodes }}" name="code" class="blue-text code">
                                            </div>
                
                                            <div class="col l3">
                                            <button type="submit" class="btn green waves-effect waves-light">Print Receipt</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div id="button-trigger" class="card card card-default aside-body scrollspy border-radius-6 fixed-width">
                                <div class="card-content p-0">
                                    <table class="display bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total Amount</th>
                                                <th><a href="javascript:void(0)" class="add mb-6 btn-floating waves-effect green darken-1"><i class="material-icons">control_point</i></th>
                                            </tr>
                                        </thead>
                                        <tbody class="addMore">
                                            <tr>
                                                <td>1</td>
                                                <td><select name="product_id[]" required="" class="product_id browser-default">
                                                        <option selected disabled="">SELECT</option>
                                                        @foreach($products as $product)
                                                        <option data-offer-qty="{{ $product->offer_quantity }}" data-price="{{ $product->wholesale_price }}" data-offer-price="{{ $product->offer_price }}" data-name="{{ $product->name }}" value="{{ $product->id }}">{{ $product->code }}</option>
                                                        @endforeach
                                                      </select>
                                                  </td>
                                                <td><input id="last_name" readonly="" class="prod_name" type="text" name="prod_name" ></td>
                                                
                                                <td><input id="last_name" required="" class="quantity" type="text" name="quantity[]" ></td>
                                                <td><input id="price" readonly="" required="" class="price" type="number" name="price[]" ></td>
                                                <td><input id="last_name" readonly="" class="total_amount" type="text" name="total_amount[]" ></td>
                                                <td><a href="javascript:void(0)" class="mb-6 btn-floating waves-effect red darken-1"><i class="material-icons">delete</i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- Content Area Ends -->

                    <!--  Contact sidebar -->
                    
                    
                    <!-- END RIGHT SIDEBAR NAV -->
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>


@endsection

@section('js')




<script src="../../../app-assets/js/vendors.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>
<script src="../../../app-assets/vendors/select2/select2.full.min.js"></script>
<script src="../../../app-assets/js/scripts/form-select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../../../app-assets/js/scripts/app-contacts.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.modal').modal();
    });

    const asideBody = new PerfectScrollbar('.aside-body', {
            suppressScrollX: true
        });


    $('#page-length-option').DataTable({
        "responsive": true,
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ]
      });

    $('.add').click(function(){

        var product = $('.product_id').html();
        var noofrows = ($('.addMore tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + noofrows + '</td>' +
        '<td><select name="product_id[]" required="" class="product_id browser-default">' + product + '</select></td>' + 
        '<td><input id="last_name" readonly="" class="prod_name" type="text" name="prod_name" ></td>' +
        '<td><input id="last_name" required="" class="quantity" type="number" name="quantity[]" ></td>'  +
        '<td><input id="last_name" readonly="" required="" class="price" type="number" name="price[]" ></td>' +
        '<td><input id="last_name" readonly="" required="" class="total_amount" type="number" name="total_amount[]" ></td>' +
        '<td><a href="javascript:void(0)" class="remove mb-6 btn-floating waves-effect waves-light red accent-2"><i class="material-icons">delete</i></a></td>';
        $('.addMore').append(tr);
    })

    $('.addMore').delegate('.remove', 'click', function(){
            var tr = $(this).parent().parent();
            tr.find('.product_id').val('');
            tr.find('.quantity').val('');
            tr.find('.total_amount').val('');
            tr.remove();
            totalAmount();
        })

    function totalAmount(){
        var total = 0;
            $('.total_amount').each(function(i, e){
               var amount = $(this).val() - 0;
               total += amount;
            });
            
           $('.sub_total').val(total);

            var tax = 0.16 * total;

            $('.tax').val(tax);

            var net_total = total + tax;

            $('.net_total').val(net_total);
            $('.total').html(net_total);
        }

        $(document).ready(function(){
            $('.scrollspy').scrollSpy();
        });

         $('.addMore').delegate('.product_id', 'change', function(){
            var tr = $(this).parent().parent();
            
            var name = tr.find('.product_id option:selected').attr('data-name');
            var offer_price = tr.find('.product_id option:selected').attr('data-offer-price');
            var offer_qty = tr.find('.product_id option:selected').attr('data-offer-qty');
            var qty = tr.find('.quantity').val() - 0;
            var price = tr.find('.product_id option:selected').attr('data-offer-price');
            tr.find('.prod_name').val(name);
            tr.find('.price').val(price);
            
            var price = tr.find('.price').val() - 0;
            var tax = 0.16 * price * qty;
            var total_amount = (price * qty) - tax;
            
            tr.find('.tax').val(tax);
            tr.find('.total_amount').val(total_amount);
            totalAmount();
        })



        $('.addMore').delegate('.quantity', 'keyup', function(){
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val();
            var price = tr.find('.price').val()-0;
            var total_amount = (qty * price);
            tr.find('.total_amount').val(total_amount);--
            totalAmount();

        })

        $('.amount_paid, .change_returned').keyup(function(){
            var amount = $('.amount_paid').val();
            var change = $('.change_returned').val();
            var total = $('.total').html();
            var cash_balance = amount - total;
            var change_ = cash_balance - change;


            $('.returning_change').val(change_);



           // alert(tr);
        })



    




</script>

@endsection