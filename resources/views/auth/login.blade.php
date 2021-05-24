<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $settings=App\Models\Settings::get()->first();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$settings->website_name}} - Login</title>

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
                                @if ($message = Session::get('error'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                          @endif
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>

								<!-- Form -->
                                <form action="{{route('login')}}" method="Post">
                                    @csrf
									<div class="form-group form-focus">
												<input type="email" class="form-control floating"  name="email">
												<label class="focus-label">Email</label>
												@error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
											</div>
											<div class="form-group form-focus">

												<input type="password" class="form-control floating"name="password">
												<label class="focus-label">Password</label>
												@error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
											</div>
									<div class="form-group">
										<input class="btn btn-primary btn-block" type="submit" value="Login">
									</div>
								</form>
								<!-- /Form -->

								<div class="text-center forgotpass"><a href="{{route('password.request')}}">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>

								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->

								<div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
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


