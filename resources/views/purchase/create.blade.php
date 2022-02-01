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
                    <!-- Add new contact popup -->
                    
                    <!-- Add new contact popup Ends-->

                    <!-- Sidebar Area Starts -->
                    
                    <!-- Sidebar Area Ends -->

                    <!-- Content Area Starts -->
                    <form method="post" action="{{ route('purchase.store') }}">
                    @csrf
                    <div class="content-area content-center">
                        <div class="app-wrapper">
                            <div class="datatable-search">
                                <div class="card">
                                    <div class="card-content">
                                        <h3>Create a Purchase Order</h3>
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                            @foreach($errors->all() as $error)
                                            <li class="text-red">{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>

                                        @endif
                                        <div class="row ">                                         
                                            <div class="col l6">
                                                <label for=""><b class="red-text">Suppliers Infomation</b></label>
                                                <input type="text" placeholder="Suppliers Infomation" value="" name="supplier" class="amount_paid indigo-text">
                                            </div>
                                            <div class="col l6">
                                                <label for=""><b class="red-text">Exp Arrival Date</b></label>
                                                <input type="date" id="birthdate" placeholder="--/--/----" value="" name="exp_arrival_date" class="amount_paid pickadate indigo-text">
                                            </div>
                                            <div class="col l3">
                                                <label for=""><b class="red-text">Sub Total</b></label>
                                                <input type="text" placeholder="0.00" readonly value="" name="net_total" class="sub_total indigo-text">
                                            </div><div class="col l3">
                                                <label for=""><b class="red-text">Net Tax</b></label>
                                                <input type="text" placeholder="0.00" readonly value="" name="tax" class="tax indigo-text">
                                            </div>
                                            <div class="col l3">
                                                <b><label for=""><b class="red-text">Total Amount</b></label>
                                                <input type="text" placeholder="0.00" readonly name="sub_total" class="net_total indigo-text"></b>
                                            </div>
                                            <div class="col l3">
                                                <label for="">Code</label>
                                                <input type="text" placeholder="" readonly="" value="{{ $orderCodes }}" name="p_code" class="code blue-text">
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="col 3">
                                            <button type="submit" class="btn red waves-effect waves-light">Confirm The Order</button>
                                                
                                            </div>

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
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total Price</th>
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
                                                <td><input id="price" required="" class="price" type="number" name="price[]" ></td>
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
        '<td><input id="last_name" required="" class="price" type="number" name="price[]" ></td>' +
        '<td><input id="last_name" readonly="" required="" class="total_amount" type="number" name="total_amount[]" ></td>' +
        '<td><a href="#" class="remove mb-6 btn-floating waves-effect waves-light red accent-2"><i class="material-icons">delete</i></a></td>';
        $('.addMore').append(tr);
    })

    $('.addMore').delegate('.remove', 'click', function(){
            var tr = $(this).parent().parent();

          //  var na = 0;
            tr.find('.product_id').val('');
            tr.find('.prod_name').val('');
            tr.find('.quantity').val('');
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
            
           $('.sub_total').val(total);

            var tax = 0.16 * total;

            $('.tax').val(tax);

            var net_total = total + tax;

            $('.net_total').val(net_total);


           
        }

        $(document).ready(function(){
            $('.scrollspy').scrollSpy();
        });

         $('.addMore').delegate('.product_id', 'change', function(){
            var tr = $(this).parent().parent();
            var name = tr.find('.product_id option:selected').attr('data-name');
            var qty = tr.find('.quantity').val();
            var price = tr.find('.price').val();

            tr.find('.prod_name').val(name);

            var total_amount = qty * price;


            var tax = 0.16 * price * qty;
            
            
            tr.find('.tax').val(tax);
            tr.find('.total_amount').val(total_amount);
            totalAmount();
        })



        $('.addMore').delegate('.quantity, .price', 'keyup', function(){
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val();
            var disc = tr.find('.discount').val();
            var price = tr.find('.price').val();
            var tax = 0.16 * price * qty;
            var total_amount = (qty * price);
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