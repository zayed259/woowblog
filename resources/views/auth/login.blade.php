<!doctype html>
<html lang="en">

<head>
	<title>{{ config('app.name', 'Laravel') }} | Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="{{url('assets/img/icons/icon-48x48.png')}}" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/logregstyle.css')}}">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Login</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>

							<!-- Session Status -->
							<x-auth-session-status class="mb-4 text-danger" :status="session('status')" />
							<!-- Validation Errors -->
							<x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

							<form action="{{ route('login') }}" method="POST" class="signin-form">
                                @csrf
								<div class="form-group mt-3">
									<input type="email" class="form-control" name="email" required>
									<label class="form-control-placeholder" for="username">Email</label>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
								</div>
								<div class="form-group d-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
                                    @if (Route::has('password.request'))
									<div class="w-50 text-right">
										<a href="{{ route('password.request') }}">Forgot Password</a>
									</div>
                                    @endif
								</div>
							</form>
							<p class="text-center">Not a member? <a data-toggle="tab" href="{{ route('register') }}">Register</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assets/js/logreg.js')}}"></script>

</body>

</html>