@extends('layouts.main')

@section('css')

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">

@section('content')


<div id="main">
      <div class="row">
        <div class="col l12 s12">
          <div class="container">
            <div class="section">
                <div class="card">
                    <div class="card-content">
                        <h5>List of Stores</h5>
                        <table class="responsive-table display" id="page-ength-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th>Store Name</th>
                                <th>Manager</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($main_stores as $key => $product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><b>{{ $product->store_name }}</b></td>
                                    <td>{{ $product->manager }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d-m-Y') }}</td>
                                    @if($product->status == 1)
                                        <td><span class="badge badge pill red  float-center">Ingco Store</span></td>
                                    @else
                                        <td><span class="badge badge pill green">Consigned Store</span></td>
                                    @endif
                                    
                                    <td>
                                    <a href="{{ route('edit_stores', $product->id) }}" class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow">
                                        <i class="material-icons">brush</i>
                                        </a>
                                    <a class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-cyan-light-green gradient-shadow modal-trigger" href=""><i class="material-icons">view_agenda</i></a>
                                        <!-- Modal Structure -->
                                    </td>
                                </tr>
                            @endforeach
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