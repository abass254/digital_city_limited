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
                            <a href="{{ route('product.create') }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-green-teal gradient-shadow">
                              <i class="material-icons">add</i>
                            </a>
                            <!-- Modal Trigger -->
                              
                          </p>
                        <h3>List of Product Details</h3>

                        <table class="display" id="page-ength-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Buying Price</th>
                                <th>Offer Quantity</th>
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
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->buying_price }}</td>
                                <td>{{ $product->offer_quantity }}</td>
                                <td>{{ $product->offer_price}}</td>
                                <td>{{ $product->wholesale_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>
                                    
                                    <!-- <a href="" class="btn btn-info"><i class="material-icons">add</i></a> -->
                                    <a href="{{ route('product.edit', $product->id) }}" class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow">
                                      <i class="material-icons">brush</i>
                                    </a>
                                    <a class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-cyan-light-green gradient-shadow modal-trigger" href="#modal1{{ $product->id }}"><i class="material-icons">view_agenda</i></a>
                                      <!-- Modal Structure -->
                                      <div id="modal1{{ $product->id }}" class="modal">
                                        <div class="col s12 m6 l6">
                                          <div class="card-panel border-radius-6 mt-10 card-animation-1">
                                            <a href="#"><img class="responsive-img border-radius-8 z-depth-4 image-n-margin"
                                                src="{{ asset('images/' . $product->image)}}" alt=""></a>
                                            <h6 class="deep-purple-text text-darken-3 mt-5"><a href="#">Product Description</a></h6>
                                            <span>{{ $product->description }}</span>
                                            
                                          </div>
                                        </div>
                                      </div>
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