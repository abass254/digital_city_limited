@extends('layouts.main')

@section('css')

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">

@section('content')


<div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
                <div class="card">

                    <div class="card-content">
                        <p>
                           
                            <!-- Modal Trigger -->
                              
                          </p>
                        <h3>List of Purchased Items</h3>

                        <table class="responsive-table display" id="page-ength-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Purchase Code</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                                @if(count($imported_items) < 1 )

                                <tr class="mx-auto"><td colspan="6"><b ><center class="red-text">No Purchase Items</center></b></td></tr>

                                @else
                                
                                
                                @foreach($imported_items as $key => $product)

                                
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><b>{{ $product->code }}</b></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td><b>{{ $product->p_code }}</b></td>
                                <td><a href="{{ route('accept_dispatch', $product->stock_id)}}" class="btn red waves-effect waves-light right">Confirm Details</a></td>
                            </tr>
                           
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


@endsection

@section('js')


<script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>

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



</script>

@endsection