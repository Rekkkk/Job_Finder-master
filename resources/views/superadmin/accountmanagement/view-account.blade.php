@extends('superadmin.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12">
                <h1><b>Account Details</b></h1>
            </div>
        </div><hr>
        <div class="text-center">
            <div class="row">
                <div class="col-lg-12">
                    <label class="h3"><b>ACCOUNT ID : </b>{{ $user->user_id }}</label>
    
                </div>
    
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <label class="h3"><b>ACCOUNT NAME: </b>{{ $user->name }}</label>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <label class="h3"><b>EMAIL: </b>{{ $user->email }}</label>
                </div>
            </div>
        </div>
    </div>
@endsection