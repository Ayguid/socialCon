@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @include('widgets.panel')
                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> --}}

                <div class="card-body">
                  <a class="" href="{{ url('/settings') }}" role="button" ><i class="fas fa-wrench">&nbsp;&nbsp; </i>User Settings</a><br>
                </div>

                <div class="card-body">
                  <a class="" href="{{ url('/profile') }}" role="button" ><i class="fas fa-user"> &nbsp;&nbsp; </i>User Profile</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
