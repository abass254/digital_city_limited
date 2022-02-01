@extends('layouts.main')

@section('css')

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">

@section('content')


<div id="main">
      <div class="row">
        <div class="col l6 s12">
          <div class="container">
            <div class="section">
                <div class="card">
                    <div class="card-content">
                        <h5>Pending Quotations</h5>
                        <table class="responsive-table display" id="page-ength-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th>Quotation Code</th>
                                <th>Sub Total</th>
                                <th>Net Tax</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                                @if(count($approved_quots) < 1 )

                                <tr class="mx-auto"><td colspan="6"><b ><center class="red-text">No Pending Quotations</center></b></td></tr>

                                @else
                                
                                
                                @foreach($approved_quots as $key => $product)

                                
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><b>{{ $product->code }}</b></td>
                                <td><b>{{ number_format($product->sub_total)  }}</b></td>
                                <td><b>{{ number_format($product->net_tax)  }}</b></td>
                                <td><b>{{ number_format($product->total_amount)  }}</b></td>
                                @if($product->status == 0)
                                    <td><span class="badge badge pill red  float-center">Pending</span></td>
                                @else
                                    <td><span class="badge badge pill green">Approved</span></td>
                                @endif
                                <td>
                                <td><a href="{{ route('view_quot_items', $product->id)}}" class="mb-6 btn-floating waves-effect orange darken-1"><i class="material-icons">shopping_cart</i></td>
                                <td><a href="{{ route('get_quot', $product->id)}}" class="mb-6 btn-floating waves-effect indigo darken-1"><i class="material-icons">pageview</i></td>
                            </tr>
                           
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 l6">
        <div class="container">
          <div class="section">
              <div class="card">

                  <div class="card-content">
                      
                      <h5>Approved Quotations</h5>

                      <table class="responsive-table display" id="page-ength-option">
                          <thead>
                          <tr class="cyan-text">
                              <th>No</th>
                              <th>Quotation Code</th>
                              <th>Sub Total</th>
                              <th>Net Tax</th>
                              <th>Total Amount</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>

                              @if(count($pending_quots) < 1 )

                              <tr class="mx-auto"><td colspan="6"><b ><center class="red-text">No Pending Quotations</center></b></td></tr>

                              @else
                              
                              
                              @foreach($pending_quots as $key => $product)

                              
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td><b>{{ $product->code }}</b></td>
                              <td><b>{{ number_format($product->sub_total)  }}</b></td>
                              <td><b>{{ number_format($product->net_tax)  }}</b></td>
                              <td><b>{{ number_format($product->total_amount)  }}</b></td>
                              @if($product->status == 0)
                                  <td><span class="badge badge pill red  float-center">Pending</span></td>
                              @else
                                  <td><span class="badge badge pill green">Approved</span></td>
                              @endif
                              <td>
                              <td><a href="{{ route('view_quot_items', $product->id)}}" class="mb-6 btn-floating waves-effect green darken-1"><i class="material-icons">shopping_cart</i></td>
                              <td><a href="{{ route('approved_quot', $product->id)}}" class="mb-6 btn-floating waves-effect indigo darken-1"><i class="material-icons">pageview</i></td>
                          </tr>
                         
                          @endforeach
                          @endif
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
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