<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Syed Zayed Hossain">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pagetitle') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{url('assets/img/icon-48x48.png')}}" />
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <nav class="navbar navbar-expand">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{url('assets/img/icon-48x48.png')}}" alt="" width="40" height="40">
            </a>
            <form class="d-flex me-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search Kabutar" aria-label="Search">
            </form>
            <!-- messanger start -->
            <div class="dropdown notification">
                <button type="button" class="nav-link btn" id="messanger"
                data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-comment-dots"></i>
                    <span>
                      7
                      <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="messanger">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <!-- messanger end -->
            <!-- notification start -->
            <div class="dropdown notification">
                <button type="button" class="nav-link btn" id="notification"
                data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span>
                      9+
                      <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notification">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <!-- notification end -->
            <!-- profile start -->
            @guest
            <ul class="navbar-nav mb-2 mb-lg-0 desktop-profile">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{url('assets/img/avatar.jpg')}}" alt="" width="40" height="40">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{url('login')}}">Login</a></li>
                        <li><a class="dropdown-item" href="{{url('register')}}">Register</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="navbar-nav mb-2 mb-lg-0 desktop-profile">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($user->profile)
                        <img src="{{url(Storage::url($user->profile->image))}}" alt="" width="40" height="40">
                        @else
                        <img src="{{url('assets/img/avatar.jpg')}}" alt="" width="40" height="40">
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{url('profile')}}">Profile</a></li>
                        {{-- <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li> --}}
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            @endguest
            <div class="mobile-profile">
                <a class="nav-link" href="menu.html" role="button">
                    <img src="{{url('assets/img/avatar.jpg')}}" alt="" width="40" height="40">
                </a>
            </div>
            <!-- profile end -->
            <!-- </div> -->
        </div>
    </nav>
    <div class="container-fluid main">
        <div class="row row-height">
            <div class="col-md-3 left">
                <a href="#" class="left-row">
                    <div class="left-row-image">
                        <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                    </div>
                    <div class="left-row-name">
                        <h4>Syed Abu Zayed Hossain</h4>
                    </div>
                </a>
                <a href="#" class="left-row">
                    <div class="left-row-image">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="left-row-name">
                        <h4>Friends</h4>
                    </div>
                </a>
                <a href="#" class="left-row">
                    <div class="left-row-image">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="left-row-name">
                        <h4>Groups</h4>
                    </div>
                </a>
                <a href="#" class="left-row">
                    <div class="left-row-image">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div class="left-row-name">
                        <h4>Memories</h4>
                    </div>
                </a>
                <a href="#" class="left-row">
                    <div class="left-row-image">
                        <i class="fas fa-pager"></i>
                    </div>
                    <div class="left-row-name">
                        <h4>Pages</h4>
                    </div>
                </a>
            </div>
            @yield('content')
            <div class="col-md-3 right">
                <!-- friend request section -->
                <div class="friend-req-title">
                    <h5>Friend Requests</h5>
                    <h5>
                        <a href="#">See All</a>
                    </h5>

                </div>
                <div class="friend-request">
                    <a href="#">
                        <div class="d-flex flex-row align-items-center">
                            <div class="friend-request-image">
                                <img src="assets/img/avatar.jpg" class="" alt="Profile Image">
                            </div>
                            <div class="friend-request-name">
                                Ariful Islam
                                <i class="fas fa-check-circle text-success"></i>
                                <p class="m-0 text-secondary">10 min ago</p>
                            </div>
                        </div>
                        <div class="friend-request-action">
                            <button class="btn btn-success btn-sm">Confirm</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </a>
                </div>
                <div class="friend-request">
                    <a href="#">
                        <div class="d-flex flex-row align-items-center">
                            <div class="friend-request-image">
                                <img src="assets/img/avatar.jpg" class="" alt="Profile Image">
                            </div>
                            <div class="friend-request-name">
                                Rakibul Islam
                                <i class="fas fa-check-circle text-success"></i>
                                <p class="m-0 text-secondary">10 min ago</p>
                            </div>
                        </div>
                        <div class="friend-request-action">
                            <button class="btn btn-success btn-sm">Confirm</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </a>
                </div>
                <div class="friend-request">
                    <a href="#">
                        <div class="d-flex flex-row align-items-center">
                            <div class="friend-request-image">
                                <img src="{{url('assets/img/avatar.jpg')}}" class="" alt="Profile Image">
                            </div>
                            <div class="friend-request-name">
                                Md Jony
                                <p class="m-0 text-secondary">10 min ago</p>
                            </div>
                        </div>
                        <div class="friend-request-action">
                            <button class="btn btn-success btn-sm">Confirm</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </a>
                </div>
                
                <hr>
                <!-- friend request section end -->
                <!-- online contacts section start -->
                <div class="online-contacts-title">
                    <h5>Online Contacts</h5>
                    <h5>
                        <a href="#">See All</a>
                    </h5>
                </div>
                <div class="online-contacts">
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Shariful Islam</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>A Mahmud Umer</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Imran Islam</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Irin Binte Abbas</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Tamimul Islam</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Mohsin Adnan</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Feroze Alam</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Tasnim Al-Rahman</h4>
                        </div>
                    </a>
                    <a href="#">
                        <div class="online-contacts-image">
                            <img src="{{url('assets/img/avatar.jpg')}}" alt="">
                            <span>
                                <i class="fa-solid fa-circle"></i>
                            </span>
                        </div>
                        <div class="online-contacts-name">
                            <h4>Jewel Rana</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-primary" href="{{url('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('assets/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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