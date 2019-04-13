<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset( 'vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Hospital4CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log in<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/register">Sign up</a>
                </li>


            </ul>

        </div>
    </div>
</nav>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="/register">
                @csrf
                <span class="login100-form-title p-b-43">
						Sign up
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" value="{{ old('email') }}"  required autofocus>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}"  required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Name</span>
                </div>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif

{{--                <div class="flex-sb-m w-full p-t-3 p-b-32">--}}
{{--                    <div class="contact100-form-checkbox">--}}
{{--                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">--}}
{{--                        <label class="label-checkbox100" for="ckb1">--}}
{{--                            Remember me--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <a href="#" class="txt1">--}}
{{--                            Forgot Password?--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign up
                    </button>
                </div>

                {{--                <div class="text-center p-t-46 p-b-20">--}}
                {{--						<span class="txt2">--}}
                {{--							or sign up using--}}
                {{--						</span>--}}
                {{--                </div>--}}

                {{--                <div class="login100-form-social flex-c-m">--}}
                {{--                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">--}}
                {{--                        <i class="fa fa-facebook-f" aria-hidden="true"></i>--}}
                {{--                    </a>--}}

                {{--                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">--}}
                {{--                        <i class="fa fa-twitter" aria-hidden="true"></i>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                <div class="mt-20">
                    <span>Already have an account? <a href="/login">Login</a></span>
                </div>
            </form>



            <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>