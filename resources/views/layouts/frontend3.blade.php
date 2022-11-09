<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Syed Zayed Hossain">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{url('assets/img/icons/icon-48x48.png')}}" />

    <title>@yield('pagetitle') | {{ config('app.name', 'Laravel') }}</title>

    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="{{url('assets/css/fontawesome.all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <div class="sidebar-brand-icon">
                    <img src="{{url('assets/img/pigeon.png')}}" alt="Logo" height="40px">
                </div>
                <div class="sidebar-brand-text mx-3">Pigeon</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="far fa-fw fa-address-book"></i>
                    <span>Home</span>
                </a>
                <a class="nav-link" href="{{url('about')}}">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>About</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
					@guest
                    <!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>
								<img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<a class="dropdown-item" href="{{url('login')}}">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Login
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{url('register')}}">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Register
								</a>
							</div>
						</li>
					</ul>
					@else
					<ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                @if ($user->profile)
                                <img src="{{url(Storage::url($user->profile->image))}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                                @else
								<img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
					@endguest

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <a class="text-muted" href="https://github.com/zayed259/PhoneBook" target="_blank"><strong>WoowBlog</strong></a> - &copy; {{date('Y');}} <a class="text-muted" href="https://www.facebook.com/zayed59" target="_blank"><strong>Syed Zayed Hossain</strong></a>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-primary" href="{{url('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{url('assets/js/admin.min.js')}}"></script>
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script>
		// $(document).ready( function () {
		// 	$('#dataTable').DataTable();
		// });

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
	</script>
	<script>
		@if(Session::has('message'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.success("{{ session('message') }}");
		@endif
	
		@if(Session::has('error'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.error("{{ session('error') }}");
		@endif
	
		@if(Session::has('info'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.info("{{ session('info') }}");
		@endif
	
		@if(Session::has('warning'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
			toastr.warning("{{ session('warning') }}");
		@endif
	</script>
    @yield('script')

</body>

</html>