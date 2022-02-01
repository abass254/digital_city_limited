@extends('layouts.main')


@section('css')

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
<!--Import materialize.css-->
<!-- CSS only -->



@section('content')

<div id="main">
      <div class="row">
        
        <div class="col s12">
          <div class="container">
            <div class="section">
                <div class="card">
                    <div class="card-content">
                        <h3>List of Receipts</h3>

                        <table class="display bordered" id="page-length-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th data-field="id">Code</th>
                                <th data-field="name">Tax</th>
                                <th data-field="price">Gross Amount</th>
                                <th>Amount Paid</th>
                                <th>Returned Change</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($cash_sales as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->code }}</td>
                                <td>{{ number_format($user->net_tax,2) }}</td>
                                <td>{{ number_format($user->gross_amount, 2)  }}</td>
                                <td>{{ number_format($user->amount_paid, 2)  }}</td>
                                <td>{{ number_format($user->returning_change, 2)  }}</td>
                                <td>
                                    
                                    <!-- <a href="" class="btn btn-info"><i class="material-icons">add</i></a> -->
                                    <a href="{{ route('view_rec', $user->id ) }}" class="btn waves-effect waves-light btn blue">
                                        View Receipt
                                      <i class="material-icons right">print</i>
                                    </a>                                    
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

<!-- JavaScript Bundle with Popper -->


 <script type="text/javascript">
    $(document).ready(function (){
        $('#page-length-option').DataTable({
            "responsive": true,
            "lengthMenu": [
              [10, 25, 50, -1],
              [10, 25, 50, "All"]
            ]
          });
    })
</script> 

@endsection