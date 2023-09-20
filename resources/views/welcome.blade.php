<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
   <!-- All Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="FPI" >
	<meta name="robots" content="" >
	{{-- <meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management" >
	<meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard" > --}}
	{{-- <meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template" > --}}
	<meta property="og:description" content="FPI Result Processing System">
	{{-- <meta property="og:image" content="social-image.html" >
	<meta name="format-detection" content="telephone=no"> --}}

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>FPI Result</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png')}}" >
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="body  h-100">
	<div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center  d-flex flex-column flex-row-auto">
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<div class="text-center mb-lg-4 mb-2 pt-5 logo">
					<img src="{{ asset('assets/fpi_logo.png')}}" alt="">
				</div>
				<h3 class="mb-2 text-white">Welcome back!</h3>
				<p class="mb-4">A simple and seemless <br>result processing system</p>
			</div>
		</div>
		<div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
			<div class="d-flex justify-content-center h-100 align-items-center">
				<div class="authincation-content style-2">
					<div class="row no-gutters">
						<div class="col-xl-12 tab-content">
							<div id="sign-up" class="auth-form tab-pane fade show active  form-validation">
								<form method="post" action="{{ route('loginAction') }}">
                                    @csrf
									<div class="text-center mb-4">
										<h3 class="text-center mb-2 text-black">Sign In</h3>
										<span>Sign in to start results processing</span>
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Email address</label>
									  <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                      {!!  requestError($errors,'email')  !!}
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Password</label>
									  <input type="password" name="password" class="form-control"  placeholder="********">

                                      {!!  requestError($errors,'password')  !!}
									</div>
									<a href="javascript:void(0);" class="text-primary float-end mb-4">Forgot Password ?</a>
									<button class="btn btn-block btn-primary">Sign In</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js')}}"></script>
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <script src="{{ asset('js/dlabnav-init.js')}}"></script>

</body>


</html>
