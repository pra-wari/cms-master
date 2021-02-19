@extends('manager.layouts.simple')
@section('title', 'Cashier Login')
@section('content')
    <!-- Hero 
    <div class="content-full">
        <div class="row justify-content-center content-full">
                <!--<img src="storage/image/login-bg.jpg" class="login-img" alt="login-img">-->
                <!--
            <div class="col-sm-3">
            </div>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-3">
                <div class="login-form-h">
                    <div class="block-content">
                        <h3><b>Welcome to LIBRA</b></h3>
                        <h6>Logically Implement Bar & Restaurant
                                    Application</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center content-full">
                <!--<img src="storage/image/login-bg.jpg" class="login-img" alt="login-img">-->
                <!--
            <div class="col-sm-3">
            </div>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-3">
                <div class="login-form">
                    <div class="block-content">
                        <form method="POST" action="/manager">
                            @csrf
                            <h1>Login</h1>
                            @if($invalid)
                                <span class="error">{{ $invalid }}</span>
                            @endif
                            <div class="form-group">
                                
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" value="{{old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="Password" placeholder="Password" value="{{old('password')}}">
                                @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="hero-static d-flex align-items-center">
        <div class="w-100">
            <!-- Sign In Section -->
            <div class="bg-white">
                <div class="content content-full">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="mb-2">
                                    <i class="fa fa-2x fa-circle-notch text-primary"></i>
                                </p>
                                <h1 class="h4 mb-1">
                                    Sign In
                                </h1>
                                @if($invalid)
                                    <span class="error">{{ $invalid }}</span>
                                @endif
                                <!--<h2 class="h6 font-w400 text-muted mb-3">
                                    A perfect match for your project
                                </h2>-->
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="/cashier" method="POST">
                                @csrf
                                <div class="py-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg form-control-alt" name="email" id="email" placeholder="Email ID" value="{{old('email')}}">
                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg form-control-alt" name="password" id="Password" placeholder="Password" value="{{old('password')}}">
                                        @if ($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="d-md-flex align-items-md-center justify-content-md-between">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember">
                                                <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                                            </div>
                                            <div class="py-2">
                                                <a class="font-size-sm font-w500" href="op_auth_reminder2.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center mb-0">
                                    <div class="col-md-6 col-xl-5">
                                        <button type="submit" class="btn btn-block btn-primary">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Sign In Section -->

            <!-- Footer 
            <div class="font-size-sm text-center text-muted py-3">
                <strong>OneUI 4.8</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
            <!-- END Footer -->
        </div>
    </div>
    <!-- END Hero -->
@endsection
