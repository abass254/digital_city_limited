@extends('layouts.main')


@section('css')

<!-- <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
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
                        <h3>Cash Statement</h3>
                        <table class="display bordered" id="page-ength-option">
                            <thead>@foreach($month as $month_info)
                                <tr> <th colspan="6"><b><center><b class="green-text">In the Month of {{ date("F", mktime(0, 0, 0, $month_info['summary']['month'], 1)) }}, {{ $month_info['summary']['year']}}</b></center></b></td></tr>
                            <tr class="cyan-text">
                                <th data-field="id">Transaction Code</th>
                                <th data-field="name">Date</th>
                                <th data-field="price">Description</th>
                                <th>Debit (Db)</th>
                                <th>Credit (Cr)</th>
                                <th>Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach ($month_info['transactions'] as $transaction_meta)
                                <tr>
                                    <td>{{ $transaction_meta['t_no'] }}</td>
                                    <td>{{ $transaction_meta['t_date'] }}</td>
                                    <td>{{ $transaction_meta['t_description'] }}</td>
                                    <td>{{ number_format($transaction_meta['t_debit'], 2) }}</td>
                                    <td>{{ number_format($transaction_meta['t_credit'], 2) }}</td>
                                    <td>{{ number_format($transaction_meta['t_balance'], 2) }}</td>
                                <tr>
                             @endforeach
                             {{-- Totals --}}
                             <tr class="red-text">
                                <td colspan="3"><b>Total</b> </td>
                                <td><b>{{ number_format($month_info['summary']['t_debit'], 2)}}</b></td>
                                <td><b>{{ number_format($month_info['summary']['t_credit'], 2) }}</b></td>
                                <td><b>{{ number_format($month_info['summary']['t_balance'], 2) }}</b></td>
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
<!-- <script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/js/dataTables.select.min.js"></script> -->

<!-- JavaScript Bundle with Popper -->


<!-- <script type="text/javascript">
    $(document).ready(function (){
        $('#page-length-option').DataTable({
            "responsive": true,
            "lengthMenu": [
              [10, 25, 50, -1],
              [10, 25, 50, "All"]
            ]
          });
    })
</script> -->

@endsection