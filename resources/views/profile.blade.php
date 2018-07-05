@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row justify-content-center">



      <div class="col-md-8">
        <div class="card">



          @include('widgets.panel')
          <div class="card-body">
            <img id='img-upload' src="{{ Auth::user()->getPhoto() }}" alt="" width="100%;"/>
          </div>

          <div class="card-body">
            <form id="form-upload-profile-photo" enctype="multipart/form-data" action="#" action="POST" >

                <div class="change-image">
                    <input id="imgInp" type="file" accept="image/*" name="image" value="image" class="btn btn-primary"  >
                </div><br>
                <button id="submitPic" class="btn btn-primary" type="submit" name="button">Commit da Pic</button>
            </form>
          </div>




          <div class="form-group">

             </div>



        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/profile.js') }}"></script>
@endsection
