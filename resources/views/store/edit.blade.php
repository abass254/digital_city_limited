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
                            <a href="{{ route('staff.index') }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                              <i class="material-icons">arrow_back</i>
                            </a>
                          </p>
                        <h3>Edit Store Details</h3>
                        <form method="POST" action="{{ route('store.update', $stores->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Store Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $stores->store_name }}" name="store_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Manager') }}</label>

                            <div class="col-md-6">
                                <select name="manager" required="">
                                    @foreach ($users as $user)    
                                    <option value="{{ $user->id }}" {{ $stores->manager == $user->id ? 'selected' : '0' }}>{{ $user->name }}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Manager') }}</label>

                            <div class="col-md-6">
                                <select name="status" required="">
                                    <option value="1" {{ $stores->status == "1" ? 'selected' : '' }}>Main Store</option>
                                    <option value="2" {{ $stores->status == "2" ? 'selected' : '' }}>Consigned Store</option>    
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
        </div>
    </div>



@endsection