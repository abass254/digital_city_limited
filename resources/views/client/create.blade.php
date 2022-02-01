@extends('layouts.main')

@section('content')


<div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
                <div class="card">
                    <div class="card-content">
                        <p>
                            <a href="{{ route('client.index') }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                              <i class="material-icons">arrow_back</i>
                            </a>
                          </p>
                        <h3>Add Client Details</h3>
                        <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if($errors->any())

                          <div class="alert alert-danger">
                            <ul>
                              @foreach($errors->all() as $error)
                              <li class="red-text">{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>

                          @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Client Name') }}</label>

                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" value="" name="client_name" value="{{ old('client_name') }}" required autocomplete="client_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="" name="email" value="{{ old('email') }}" required autocomplete="email">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Client Location</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control" value="" name="location" required>
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Contact</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control" value="" name="contact" required>
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                            <div class="btn">
                                <span>Work Input</span>
                                <input type="file" name="work_permit">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" name="work_permit" type="text">
                              </div>
                              
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
        </div>
    </div>



@endsection