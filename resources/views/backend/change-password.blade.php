@extends('backend.layout')
@section('title')
Change Password
@endsection
@section('page_name')
Change Password
@endsection
@section('content')
</style>
<div class="container mt-3">
    <!-- Nav tabs -->
    @if ($error = $errors->first('message'))
    <div class="alert alert-danger" id="success-alert">
        {{ $error }}
    </div>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible" id="success-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session()->get('message')}}
    </div>
    @endif

    <!-- <h3>Change Password</h3> -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{asset('change-password')}}" id="loginForm" name="loginForm">
                {{@csrf_field()}}
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="password">Password:</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" id="Password" required>
                            <div class="text-danger">
                                @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password:</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="password" name="c_password" class="form-control" placeholder="Confirm password" id="ConfirmPassword" required>
                            <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                            <div class="text-danger">
                                @if ($errors->has('password'))
                                {{ $errors->first('c_password') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <button type="submit" name="submit" onClick="validatePassword();" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection