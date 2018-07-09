@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-md-8">

        <div class="card">

          @include('widgets.panel')
          <div class="card-body">
          </div>

          <div class="card-body">
             Name :{{$product->product_name}}<br>
             Price :{{$product->price}}<br>
             Description :{{$product->product_description}}<br>
             Category :{{$product->getCategory->category}}<br>
          </div>



          <div class="card-body">
            <a class="" href="{{route('products')}}" role="button" ><i class="fas fa-store">&nbsp;&nbsp; </i>Back to products</a><br>
          </div>




        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/profile.js') }}"></script>
@endsection
