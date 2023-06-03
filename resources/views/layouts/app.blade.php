<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/image/logo-login.png">
	<link rel="stylesheet" href="{{asset('assets/css/admin/bootstrap.min.css')}}"> 
	<link rel="stylesheet" href="{{asset('assets/css/admin/style.css')}}"> 
	<link rel="stylesheet" href="{{asset('assets/css/admin/style2.css')}}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <!-- Add Bootstrap CSS -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">   
    @livewireStyles
</head>
<body class="mini-sidebar">
    <div class="main-wrapper">
		<div class="sidebar bg-dark" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
                    <ul class="navigation">
                        <li class="submenu"> <a class="btn" href="{{route('admin.item')}}"><i class="bi bi-grid-1x2-fill"></i><span>Item</span> </a></li>
                        <li class="submenu"> <a class="btn" href="{{route('admin.category')}}"><i class="fa-solid fa-list"></i><span>Category</span> </a></li>
                        <li class="submenu logout-btn"> <a href="{{route('loggout')}}" class="btn"><i class="bi bi-box-arrow-right"></i><span>Logout</span> </a></li>
                    </ul>
				</div>
			</div>
		</div>
		<div class="header">
			<div class="header-left bg-dark">
				<a href="{{route('admin.item')}}" class="btn logo"> <img src="{{asset('assets/image/login-logo.png')}}" width="50" height="70" alt="logo" > <span class="logoclass">Admin Panel</span> </a>
				<a href="{{route('admin.item')}}" class="btn  logo logo-small"> <img src="{{asset('assets/image/login-logo.png')}}" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn" class="btn"> <i class="fas fa-bars"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
						
			<ul class="nav user-menu-right">
				<li class="nav-item dropdown has-arrow mt-2">
					<div class="nav-link">
						<b class="path">{{request()->path()}}</b>
					</div>
				</li>
			</ul> 
			<ul class="nav user-menu">
				<li class="nav-item dropdown has-arrow">
					<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
						<i style="font-size:25px;" class="bi bi-person-bounding-box"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{route('register')}}">Login</a></li>
						<li><a class="dropdown-item" href="{{route('login')}}">Register</a></li>
					</ul>
				</li>
			</ul>
		</div>
        <div class="page-wrapper">
            {{$slot}}
        </div>
	</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script src="{{asset('assets/js/admin/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/admin/jquery.slimscroll.min.js')}}"></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<script src="{{asset('assets/js/admin/script.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    @livewireScripts
</body>

</html>