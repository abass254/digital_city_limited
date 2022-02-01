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
                            <a href="{{ route('product.index') }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-red-teal gradient-shadow">
                              <i class="material-icons">arrow_back</i>
                            </a>
                          </p>
                        <h3>Add Product Details</h3>
                        <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                          @csrf

                          @if($errors->any())

                          <div class="alert alert-danger">
                            <ul>
                              @foreach($errors->all() as $error)
                              <li class="text-red">{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>

                          @endif
                          <div class="row">
                            <div class="input-field col m6 s12">
                              <input id="first_name01" required="" name="name" type="text">
                              <label for="first_name01" >Product Name</label>
                            </div>
                            <div class="input-field col m6 s12">
                              <input id="last_name" required="" type="text" name="code" >
                              <label for="last_name">Product Code</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col l3 m6 col s12">
                              <input id="email5" required="" name="buying_price" type="text">
                              <label for="email">Buying Price</label>
                            </div>
                            <div class="input-field col l3 m6 col s12">
                              <input id="email5" required="" name="offer_price" type="text">
                              <label for="email">Offer Price</label>
                            </div>
                            <div class="input-field col l3 m6 col s12">
                              <input id="email5" required="" name="wholesale_price" type="text">
                              <label for="email">Wholesale Price</label>
                            </div>
                            <div class="input-field col l3 m6 col s12">
                              <input id="email5" required="" name="selling_price" type="text">
                              <label for="email">Retail Price</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col m6 s12">
                              <select name="category" required="">
                                <option value="" disabled selected>Choose product category</option>
                                <option value="Bench Tools">Bench Tools</option>
                                <option value="Air Tools">Air Tools</option>
                                <option value="Safety Product">Safety Product</option>
                                <option value="Generators">Generators</option>
                                <option value="Water Pumps">Water Pumps</option>
                                <option value="Garden Tools">Garden Tools</option>
                                <option value="Power Tools">Power Tools</option>
                                
                              </select>
                              <label>Select Category</label>
                            </div>
                            <div class="input-field col m6 s12">
                              <input required="" type="text" name="offer_quantity" value="0" id="dob">
                              <label for="dob">Offer Quantity</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col m6 s12 file-field input-field">
                              <div class="btn float-right">
                                <span>Product Image</span>
                                <input name="image" type="file">
                              </div>
                              <div class="file-path-wrapper">
                                <input name="image" class="file-path validate" type="text">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <textarea required="" id="message5" name="description" class="materialize-textarea"></textarea>
                              <label for="message">Product Description</label>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                  <i class="material-icons right">send</i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
       


@endsection