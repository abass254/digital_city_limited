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
                          </p>
                        <h3>List of Product Details</h3>

                        <table class="display responsive-table" id="page-length-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Min Qty</th>
                                <th>Offer Price</th>
                                <th>Wholesale Price</th>
                                <th>Retail Price</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->offer_quantity }}</td>
                                <td>{{ $product->offer_price }}</td>
                                <td>{{ $product->wholesale_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>
                                    
                                    <!-- <a href="" class="btn btn-info"><i class="material-icons">add</i></a> -->
                                     <!-- <a class="btn waves-effect waves-light btn indigo modal-trigger" href="#modal1{{ $product->prod_id }}">V</a> -->
                                      <!-- Modal Structure -->
                                      <!-- <div id="modal1{{ $product->prod_id }}" class="modal">
                                        <div class="col s12 m6 l6">
                                          <div class="card-panel border-radius-6 mt-10 card-animation-1">
                                            <a href="#"><img class="responsive-img border-radius-8 z-depth-4 image-n-margin"
                                                src="{{ asset('images/' . $product->image)}}" alt=""></a>
                                            <h6 class="deep-purple-text text-darken-3 mt-5"><a href="#">Product Description</a></h6>
                                            <span>{{ $product->descr }}</span>

                                            <ul>

                                            </ul>
                                            
                                          </div>
                                        </div>
                                      </div> -->

                                      <a class="btn btn indigo modal-trigger" href="{{ route('qty_per_store', $product->prod_id)}}">Load More</a>
                                    </td>
                            </tr>
                            @endforeach
                            
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