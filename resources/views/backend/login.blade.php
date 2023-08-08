<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Login</title>
    <style>
        body {
            /*background-color: #41B3A3;
        background-color: #febd54!important;*/
            background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#cbccc8)) fixed;
        }

        .form-container {
            position: absolute;
            top: 20vh;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000;
        }

        .form-container .heading-text {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-center" style="position: absolute;top: 5vh;">

                </div>
                <form action="{{asset('admin')}}" method="post" id="formLogin" class="form-container" style="width: 360px;margin: 0 0 0 -15px;">
                    <h2 class="text-center">Login</h2>
                    <p class="text-center">Please provide your Email to login <span class="text-danger heading-text"><br /><b>Ryax Research</b></span></p>
                    @if ($error = $errors->first('message'))
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endif
                    {{@csrf_field()}}
                    <div class="mb-3">
                        <label for="emails" class="form-label"><b>Email</b></label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                        @if ($errors->has('username'))
                        {{ $errors->first('username') }}
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                    @endif
                    <!-- <div class="mb-3 form-check">
              <input type="checkbo  x" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
                    <button type="submit" name="submit" value="Login" class="btn btn-dark btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>