<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="">

	<title>{{ config('app.name', 'Laravel') }} | @yield('pagetitle')</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                </ul>
                @guest
                <ul class="navbar-nav mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                </ul>
                @else
                <ul class="navbar-nav mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('blog.create')}}">Create Post</a>

                    </li>
                </ul>
                @endguest
          </div>
        </div>
    </nav>

    <div class="container mt-5 pt-3">
        @yield('content')
    </div>
    <div class="container-fluid bg-dark" style="height: 100px">
        <footer class="footer">
            <div class="container-fluid">
                    <div class=" text-center pt-4">
                        <p class="mb-0">
                            <a class="text-muted" href="#" target="_blank"><strong>BlogSite</strong></a> - <span class="text-muted" href="#" target="_blank">&copy; {{date('Y');}} <strong> Developed by: <a href="https://www.facebook.com/zayed59/" target="_blank">Sayed Abu Zayed Hossain</a></strong></span>
                        </p>
                    </div>
            </div>
        </footer>
    </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
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