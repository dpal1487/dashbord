@extends('backend.layout')
@section('title')
Profile
@endsection
@section('page_name')
Profile
@endsection
@section('content')
</style>
<div class="container mt-3">
    <!-- Nav tabs -->
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible" id="success-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session()->get('message')}}
    </div>
    @endif


    <!-- Tab panes -->

    <!-- <h3>Profile</h3> -->
    <div class="card">
        <div class="card-body">
            <form action="{{asset('profile')}}" method="post" role="form">
                {{@csrf_field()}}
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="username">Name:</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter Name" value="{{$admin->username}}">
                            <div class="text-danger">
                                @if ($errors->has('username'))
                                {{ $errors->first('username') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="email">Email:</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$admin->email}}" required>
                            <div class="text-danger">
                                @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <button type="submit" name="submit" value="profileUpdate" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection