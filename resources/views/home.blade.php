@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span style="color:red;">{{ Auth::user()->name }}'s'</span> Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                </div>

                <div class="card-body">

                  <a class="" href="{{ url('/settings') }}" role="button" ><i class="fas fa-wrench"></i>User Settings</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
