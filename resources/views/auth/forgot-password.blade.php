<!doctype html>
<html lang="en">

<head>
	<title>{{ config('app.name', 'Laravel') }} | Forgot Password</title>
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
									<h3 class="mb-2">Reset Password</h3>
								</div>
							</div>
                                <p class="mb-4 border p-2">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

							<!-- Session Status -->
							<x-auth-session-status class="mb-4 text-danger" :status="session('status')" />
							<!-- Validation Errors -->
							<x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

							<form action="{{ route('password.email') }}" method="POST" class="signin-form">
                                @csrf
								<div class="form-group mt-3">
									<input type="email" class="form-control" name="email" required>
									<label class="form-control-placeholder" for="email">Email</label>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Email Password Reset Link</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assets/js/logreg.js')}}"></script>

	{{-- <script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/main.js"></script> --}}

</body>

</html>