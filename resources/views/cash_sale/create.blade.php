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
            <div class="col s12">
                <div class="container">
                    <form method="post" action="{{ route('store_cash_sales') }}">
                    @csrf
                    <div class="content-area content-center">
                        <div class="app-wrapper">
                            <div class="datatable-search">
                                <div class="card">
                                    <div class="card-content">
                                        <h3>TOTAL <b class="total red-text">0.00</b></h3>
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                            @foreach($errors->all() as $error)
                                            <li class="text-red">{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>

                                        @endif
                                        <div class="row">
                                            <div class="col 3">
                                            <label for="">Mode of Payment</label>
                                                <select name="prod_id[]" required="" class="app-filter" id="global_filter">
                                                    <option selected disabled="">SELECT</option>
                                                    <option value="1">MPESA</option>
                                                    <option value="2">Bank</option>
                                                    <option value="3">Cash</option>
                                                </select>
                                            </div>
                                            <div class="col 3">
                                                <label for="">Net Tax</label>
                                                <input type="text" placeholder="" readonly="" value="" name="net_tax" class="net_tax">
                                            </div>
                                                <input type="hidden" placeholder="0.00" value="" name="gross_amount" class="gross_amount">
                                         
                                            <div class="col 3">
                                                <label for="">Amount Paid</label>
                                                <input type="text" placeholder="0.00" value="" name="amount_paid" class="amount_paid">
                                            </div>
                                            <div class="col 3">
                                                <label for="">Balance</label>
                                                <input type="text" placeholder="" readonly="" value="" name="returning_change" class="returning_change">
                                            </div>
                                            <div class="col 3">
                                                <label for="">Code</label>
                                                <input type="text" placeholder="" readonly="" value="{{ $orderCodes }}" name="code" class="code red-text">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col 3">
                                            <button type="submit" class="btn green waves-effect waves-light">Print Receipt</button>
                                                
                                            </div>
                                            <!-- <div class="col 3">
                                            <button type="submit" class="btn red waves-effect waves-light">Pend Transaction</button>
                                                 -->
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
                                                
                                                <th>Quantity</th><th>Tax</th>
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
                                                <td><input type="text" placeholder="" readonly="" value="" name="tax[]" class="tax"></td>
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
                    <!-- Content Area Ends -->

                    <!--  Contact sidebar -->
                    
                    
                    <!-- END RIGHT SIDEBAR NAV -->
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>

    </form>


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
        '<td><input id="last_name" required="" class="quantity" type="number" name="quantity[]" ></td>' +
        '<td><input type="text" placeholder="" readonly="" value="" name="tax[]" class="tax"></td>' +
        '<td><input id="last_name" readonly="" required="" class="price" type="number" name="price[]" ></td>' +
        '<td><input id="last_name" readonly="" required="" class="total_amount" type="number" name="total_amount[]" ></td>' +
        '<td><a href="javascript:void(0)" class="remove mb-6 btn-floating waves-effect waves-light red accent-2"><i class="material-icons">delete</i></a></td>';
        $('.addMore').append(tr);
    })

    $('.addMore').delegate('.remove', 'click', function(){
            var tr = $(this).parent().parent();
            tr.find('.product_id').val('');
            tr.find('.quantity').val('');
            tr.find('.prod_name').val('');
            tr.find('.price').val('');
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

            $('.gross_amount').val(total);
            
            $('.total').html(total);

            var net_tax = 0;
            $('.tax').each(function(i, e){
               var tax_amount = $(this).val() - 0;
               net_tax += tax_amount;
            });

           
            $('.net_tax').val(net_tax);
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
            var qty = tr.find('.quantity').val()-0;
            var disc = tr.find('.discount').val()-0;
            var price = tr.find('.price').val()-0;
            var tax = 0.16 * price * qty;
            var total_amount = (qty * price) - tax;
            tr.find('.total_amount').val(total_amount);
            
            tr.find('.tax').val(tax);
            totalAmount();

        })

        $('.amount_paid').keyup(function(){
            var amount = $('.amount_paid').val();
            var total = $('.total').html();
            var balance = amount - total;
           // var change_ = cash_balance - change;


            $('.returning_change').val(balance);



           // alert(tr);
        })



    




</script>

@endsection