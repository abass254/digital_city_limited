@extends('layouts.main')


@section('css')

<!-- <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
<!--Import materialize.css-->
<!-- CSS only -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">



@section('content')

<div id="main">
      <div class="row">
        
        <div class="col s12">
          <div class="container">
            <div class="section">
                <div class="card">

                    <div class="card-content">
                        <h4>Cash Flow</h4>
                        <table class="display bordered" id="page-length-option">
                            <thead>@foreach($month as $month_info)
                                <tr> <th colspan="6"><b><center><b class="green-text">{{ $month_info['summary']['month'] }}/{{ $month_info['summary']['date'] }}/{{ $month_info['summary']['year'] }}</b></center></b></td></tr>

                                <tr class="black white-text">
                                    <td colspan="3"><b>Total</b> </td>
                                    <td><b>{{ number_format($month_info['summary']['t_debit'], 2)}}</b></td>
                                    <td><b>{{ number_format($month_info['summary']['t_credit'], 2) }}</b></td>
                                    <td><b>{{ number_format($month_info['summary']['t_balance'], 2) }}</b></td>
                                </tr>
                            <tr class="red-text">
                                <th data-field="id">Transaction Code</th>
                                <th data-field="name">Time</th>
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
                             
                            <tr colspan="6"></tr>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<!-- JavaScript Bundle with Popper -->


 <script type="text/javascript">
    $(document).ready(function (){
        var tbl = $(".data-list-view").DataTable({
        responsive: false,
        columnDefs: [
            {
            orderable: true,
            targets: [0],
            className: "dt-nowrap",
            checkboxes: { selectRow: true }
            },{
            orderable: false,
            className: "dt-nowrap",
            targets: [1,3,6,8,9]
            }
        ],
        dom:
            '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {
            sLengthMenu: "_MENU_",
            sSearch: ""
        },
        aLengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        select: {
            style: "multi"
        },
        order: [[2, "asc"]],
        bInfo: false,
        pageLength: 25,
        buttons: [
            {
            text: "<i class='feather icon-plus'></i> Add Corporate",
            action: function() {
                $(this).removeClass("btn-secondary");
                NewCorporate();
            },
            className: "btn-outline-danger"
            }
        ],
        initComplete: function(settings, json) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        }
        });

        tbl.on('draw.dt', function(){
            setTimeout(function(){
                if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
                }
            }, 50);
            });
    })

    $(document).ready( function () {
        $('#page-length-option').DataTable();
    } );
</script>

@endsection