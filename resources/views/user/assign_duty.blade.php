@extends('layouts.main')

@section('content')


<div id="main">
      <div class="row">
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit New Users</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">User Management</a>
                  </li>
                  <li class="breadcrumb-item active">Assign Duty
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section">
                <div class="card">
                    <div class="card-content">
                        <p>
                            <a href="{{ route('list_users') }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                              <i class="material-icons">arrow_back</i>
                            </a>
                          </p>
                        <h3>Assign Duty to User</h3>
                        <form method="POST" action="{{ route('user.update_duty', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" readonly="" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Role Assigned</label>

                            <div class="col-md-6">
                                <select name="role" value="{{ old('role') }}"  class="form-control">
                                	<option value="">Assign Role</option>
                                	<option value="Human Resource">Human Resource</option>
                                	<option value="Salesperson">Salesperson</option>
                                	<option value="Stocksperson">Stocksperson</option>
                                	<option value="Manager">Manager</option>
                                	<option value="Accountant">Accountant</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Store Assigned</label>

                            <div class="col-md-6">
                                <select name="branch" value="{{ old('branch') }}" class="form-control">
                                	<option value="">Assign Store</option>
                                	<option value="1">Mombasa</option>
                                	<option value="2">Nairobi</option>
                                	<option value="3">Kisumu</option>
                                	<option value="4">Nakuru</option>
                                	<option value="5">Meru</option>
                                	<option value="6">Eldoret</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn indigo waves-effect waves-light">
                                    {{ __('Save Changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>



@endsection