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
   {{-- {{App\Product::productData(2)}} --}}

          </div>




          <div class="form-group">

             </div>



        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/profile.js') }}"></script>
@endsection
