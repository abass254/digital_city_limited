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

@section('content')


<div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
                <div class="card">

                    <form method="POST" action="{{ route('stock.store') }}">
                        @csrf

                    
                    <div class="card-content">
                        <p>
                            
                            <!-- Modal Trigger -->
                              
                          </p>
                        <h3>List of Product Details</h3>

                        <table class="display" id="page-ength-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th>Product Code</th>
                                <th>Product Quantity</th>
                                <th><a href="javascript:void(0)" class="add mb-6 btn-floating waves-effect green darken-1">
                              <i class="material-icons">add</i>
                            </a></th>
                            </tr>
                            </thead>
                            <tbody class="addMore">
                            <tr>
                                <td class="no">1</td>
                                <td>
                                    <div class="input-field col m6 s12">
                                      <select name="prod_id[]" required="" class="prod_id">
                                        <option selected disabled="">SELECT CODE</option>
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->code }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-field col m6 s12">
                                      <input id="last_name" required="" class="qty" type="number" name="qty[]" >
                                      <label for="last_name">Quantity</label>
                                    </div>
                                </td>
                                <td>
                                    
                                    <!-- <a href="" class="btn btn-info"><i class="material-icons">add</i></a> -->
                                    <a href="javascript:void(0)" class="mb-6 btn-floating waves-effect red accent-2">
                                      <i class="material-icons">close</i>
                                    </a>
                                </td>
                            </tr>
                            
                            
                            </tbody>
                        </table>
                        <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                                  <i class="material-icons right">send</i>
                                </button>
                    </div>
                    </form>

                </div>
            </div>


@endsection

@section('js')


<script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>
<script src="../../../app-assets/vendors/select2/select2.full.min.js"></script>
<script src="../../../app-assets/js/scripts/form-select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.modal').modal();
    });

    $('#page-length-option').DataTable({
        "responsive": true,
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ]
      });

    $('.add').click(function(){

        var product = $('.prod_id').html();
        var noofrows = ($('.addMore tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + noofrows + '</td>' +
        '<td><div class="input-field col m6 s12"><select name="prod_id[]" required="" class="prod_id browser-default">' + product + '</select></div</td>' + 
        '<td><div class="input-field col m6 s12"><input id="last_name" required="" class="qty" type="number" name="qty[]" ><label for="last_name">Quantity</label></div></td>' +
        '<td><a href="javascript:void(0)" class="remove mb-6 btn-floating waves-effect waves-light red accent-2"><i class="material-icons">close</i></a></td>';
        $('.addMore').append(tr);
    })

    $('.addMore').delegate('.remove', 'click', function(){
            var tr = $(this).parent().parent();
            tr.find('.prod_id').val('');
            tr.find('.qty').val('');
            tr.remove();
        })




</script>

@endsection