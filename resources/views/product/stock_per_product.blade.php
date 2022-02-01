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
                        
                           
                        <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                        <i class="material-icons">arrow_back</i>
                    </a>

                    <div class="row">
                        <h4 class="red-text"><center>{{ $qtys->first()->code }}</center></h4>
                        <div class="col s12 m6 l6">
                            <div class="card-panel border-radius-6 mt-10">
                            <a href="#" ><img class="responsive-img" src="{{ asset('images/' . $qtys->first()->image)}}" alt=""></a>
                            <h6 class="deep-purple-text text-darken-3 mt-5"><a href="#">Product Description</a></h6>
                            <span>{{ $qtys->first()->description }}</span>

                            <ul>

                            </ul>
                            
                            </div>
                        </div>
                        <div class="col s12 m6 l6">
                        <h5>Stock Per Store</h5>
                            <table class="display bordered" id="page-ength-option">
                                <thead>
                                <tr class="cyan-text">
                                    <th>No</th>
                                    <th>Store</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($qtys as $key => $qty)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $qty->store_name }}</td>
                                    <td>{{ $qty->total }}</td>
                                </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
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