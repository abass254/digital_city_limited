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

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-contacts.css">

@section('content')


<div id="main">
        <div class="row">
            <div class="col l12 s12">
                <div class="container">
                    <div class="section">
                        <div class="card">
                            <div class="card-content">
                                <span><a href="{{ route('view_quots')}}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                                    <i class="material-icons">arrow_back</i>
                                </a></span><h4><b class="blue-text">{{$items->first()->receipt_code }}</b></h4>
                                <table class="responsive-table display" id="page-ength-option" style="width:100%">
                                    <thead>
                                    <tr class="black-text">
                                        
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th><a href="{{ route('approve_quot', $items->first()->q_id )}}" class="btn  blue darken-1">Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($items) < 1 )

                                        <tr><td colspan="5">All items Approved</td></tr>

                                        @endif
                                        @foreach($items as $key => $product)  
                                                                      
                                    <tr>                                        
                                        <td>{{ $key+1 }}</td>
                                        <td><b>{{ $product->item_code }}</b></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->qty }}</td>
                                        @if($product->qd_status == 0)
                                        <td><a href="{{ route('approve_item_quot', $product->qd_id)}}" class="add mb-6 btn-floating waves-effect green darken-1"><i class="material-icons">done</i></td>
                                        @elseif($product->qd_status == 1)
                                        <td><a href="{{ route('cancel_item_quot', $product->qd_id)}}" class="add mb-6 btn-floating waves-effect red darken-1"><i class="material-icons">close</i></td>
                                        @endif
                                        </tr>
                                   
                                    @endforeach
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
            
        </div>
    </div>


@endsection

@section('js')




<script src="../../../app-assets/js/vendors.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>
<script src="../../../app-assets/vendors/select2/select2.full.min.js"></script>
<script src="../../../app-assets/js/scripts/form-select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../../../app-assets/js/scripts/app-contacts.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.modal').modal();
    });

    const asideBody = new PerfectScrollbar('.aside-body', {
            suppressScrollX: true
        });


    </script>

@endsection