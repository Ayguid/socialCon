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
          @include('widgets.panel')
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
          </div>




          <form method="post" action="">
            @csrf

            <div class="form-group row">
              <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

                @if ($errors->has('first_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

              <div class="col-md-6">
                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

                @if ($errors->has('last_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

              <div class="col-md-6">
                <input id="birthday" type="date"  max="110"  class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ $user->birthday }}"required>

                @if ($errors->has('birthday'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birthday') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

              <div class="col-md-6">
                <input id="sex" type="string"  max="10"  class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" name="sex" value="{{ $user->sex }}"required>
                
                @if ($errors->has('sex'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('sex') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="previous_pass" class="col-md-4 col-form-label text-md-right">{{ __('Previous Password') }}</label>

              <div class="col-md-6">
                <input id="previous_pass" type="password" class="form-control" name="previous_pass" required>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Update') }}
                </button>
              </div>
            </div>
          </form>



        </div>
      </div>
    </div>
  </div>
@endsection
