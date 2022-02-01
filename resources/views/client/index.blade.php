@extends('layouts.main')


@section('css')

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">

@section('content')


@section('content')


<div id="main">
      <div class="row">
        
        <div class="col s12">
          <div class="container">
            <div class="section">
                <div class="card">

                    <div class="card-content">
                        <p>
                            <a href="{{ route('staff.create') }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                              <i class="material-icons">add</i>
                            </a>
                          </p>
                        <h3>List of Clients</h3>

                        <table class="display" id="page-length-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th data-field="id">Client Name</th>
                                <th data-field="name">Email Address</th>
                                <th data-field="price">Contact</th>
                                <th>Location</th>
                                <th>Work Permit</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($clients as $key => $client)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $client->client_name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->contact }}</td>
                                <td>{{ $client->location }}</td>
                                <td>
                                    <a  href="{{ route('client.show', $client->id) }}">View</a>  |
                                    <a  href="{{ route('download_work_permit', $client->id) }}">Download</a>
                                </td>
                                <td>
                                    
                                    <!-- <a href="" class="btn btn-info"><i class="material-icons">add</i></a> -->
                                    <a href="" class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-green-teal">
                                      <i class="material-icons">assignment</i>
                                    </a>
                                    <a href="" class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow">
                                      <i class="material-icons">brush</i>
                                    </a>
                                    
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