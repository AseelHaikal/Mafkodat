<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $settings=App\Models\Settings::get()->first();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$settings->website_name}} - Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($settings->website_favicon)}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							{{-- <img class="img-fluid" src="{{asset('assets/img/logo-white.png')}}" alt="Logo"> --}}
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								<p class="account-subtitle">Access to our dashboard</p>

								<!-- Form -->
								<form action="{{route('register')}}" method="Post">
                                    @csrf
									<div class="form-group">
                                        <input class="form-control" type="text" placeholder="Name" name="name" value="{{old('name')}}">
                                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
									</div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Phone Number" name="phone" value="{{old('phone')}}">
                                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
                                        <input class="form-control" type="email" placeholder="Email" name="email" value="{{old('email')}}">
                                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
                                        <input class="form-control" type="password" placeholder="Password" name="password">
                                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
										<input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
									</div>
									<div class="form-group mb-0">
										<input class="btn btn-primary btn-block" type="submit" value="Register">
									</div>
								</form>
								<!-- /Form -->

								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>

								<!-- Social Login -->
								<div class="social-login">
									<span>Register with</span>
						 			<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->

								<div class="text-center dont-have">Already have an account? <a href="{{route('login')}}">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js')}}"></script>

    </body>

</html>
