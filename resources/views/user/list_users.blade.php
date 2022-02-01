@extends('layouts.main')


@section('css')

<!-- <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/select.dataTables.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
<!--Import materialize.css-->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



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
                        <h3>List of Users</h3>

                        <table class="display bordered" id="page-ength-option">
                            <thead>
                            <tr class="cyan-text">
                                <th>No</th>
                                <th data-field="id">Name</th>
                                <th data-field="name">Email Address</th>
                                <th data-field="price">Contact</th>
                                <th>NHIF No</th>
                                <th>NSSF No</th>
                                <th>ID Number</th>
                                <th>Role</th>
                                <th>Store Assigned</th>
                                <th>Date Assigned</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($users as $key => $user)@if( $user->is_special == 0)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ $user->nhif_no }}</td>
                                <td>{{ $user->nssf_no }}</td>
                                <td>{{ $user->id_number }}</td>
                                <td>{{ $user->role ?? 'Not Assigned' }}</td>
                                <td>{{ $user->branch ?? 'Not Assigned' }}</td>
                                <td>{{ $user->date_assigned ?? 'Not Assigned' }}</td>
                                <td>
                                    
                                    <!-- <a href="" class="btn btn-info"><i class="material-icons">add</i></a> -->
                                    <a href="{{ route('assign_duty', $user->id ) }}" class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-green-teal">
                                      <i class="material-icons">assignment</i>
                                    </a>
                                    <a href="{{ route('staff.edit', $user->id ) }}" class="mb-6 btn-sm btn-floating waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow">
                                      <i class="material-icons">brush</i>
                                    </a>
                                    
                                </td>
                            </tr>@endif
                            @endforeach
                            
                            </tbody> 






                        </table>
                        {{$users->links('vendor.pagination.materializecss')}}
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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