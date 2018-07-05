@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-md-6 col-md-offset-3">
        @if(Session::has('alert-success'))
          <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
        @endif
        @if(Session::has('alert-danger'))
          <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
        @endif
      </div>


          <div class="col-md-8">
            <div class="card">

              {{-- {{ $user->first_name }} --}}

              @include('widgets.panel')
              <div class="card-body">

                <form id="addProductForm" class="addProductForm" action="index.html" method="post">
                  <a id="addProduct" class="" href="#" role="button" ><i class="fas fa-gift">&nbsp;&nbsp; </i>Add product</a><br>
                </form>

              </div>






              <div class="form-group">
                <form id="form1" style="display:none;" method="post">
                  @csrf

                  <div class="form-group row">
                    <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
                    <div class="col-md-6">
                      <input id="product_name" type="text" class="form-control" name="product_name" autofocus required>


                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="product_description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>
                    <div class="col-md-6">
                      <input id="product_description" type="text" class="form-control" name="product_description"  autofocus required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="product_category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>
                    <div class="col-md-6">
                      <input id="product_category" type="text" class="form-control" name="product_category"  required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                      <input id="price" type="string"  max="110"  class="form-control" name="price" required>
                    </div>
                  </div>


                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">

                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" >Submit</button>
                </form>
              </div>


                  <div class="row justify-content-center">
@include('widgets.productsList')
                  </div>



            </div>
          </div>
        </div>
      </div>

      <script src="{{ asset('js/products.js') }}"></script>
    @endsection
