<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{url('assets/img/icons/icon-48x48.png')}}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>{{ config('app.name', 'Laravel') }} | @yield('pagetitle')</title>

	<link href="{{url('assets/css/app.css')}}" rel="stylesheet">
	{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{url('blog')}}"><span class="align-middle">BlogSite</span></a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">Pages</li>
					<li class="sidebar-item {{ Request::is('blog') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{url('blog')}}"><i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Blogs</span></a>
					</li>
					<li class="sidebar-item {{ Request::is('comment') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{url('comment')}}"><i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Comments</span></a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle"><i class="hamburger align-self-center"></i></a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
							<i class="align-middle" data-feather="settings"></i>
							</a>
							<a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">{{Auth::user()->name}}</span>
								@if ($user->profile)
                                <img src="{{url(Storage::url($user->profile->image))}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                                @else
								<img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                                @endif
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{url('profile')}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<a class="dropdown-item" href="{{url('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="align-middle me-1" data-feather="log-out"></i>Logout</a>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
                @yield('content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="#" target="_blank"><strong>BlogSite</strong></a> - <span class="text-muted" href="#" target="_blank">&copy; {{date('Y');}} <strong> Developed by: <a href="https://www.facebook.com/zayed59/" target="_blank">Sayed Abu Zayed Hossain</a></strong></span>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{url('assets/js/app.js')}}"></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> --}}
	<script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
	<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	
	<script>
		$(document).ready( function () {
			$('#dataTable').DataTable();
		});
	</script>

    @yield('script')

</body>

</html>