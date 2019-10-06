<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="@yield('title')" />
    <meta name="generator" content="{{ config('app.version') }}" />
    <meta name="author" content="POPOJI" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') - {{ config('app.name') }}</title>

	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
	<link href="{{ asset('po-admin/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('po-admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('po-admin/lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('po-admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('po-admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('po-admin/lib/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('po-content/filemanager/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
	<link href="{{ asset('po-admin/assets/css/dashforge.css') }}" rel="stylesheet">
	
	@stack('styles')
	
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
</head>
<body>
	<aside class="aside aside-fixed">
        <div class="aside-header">
            <a href="{{ url('/dashboard') }}" class="aside-logo pt-2">POPOJI</a>
            <a href="#" class="aside-menu-link pt-1">
                <i data-feather="menu"></i>
                <i data-feather="x"></i>
            </a>
        </div>
        <div class="aside-body">
			<ul class="nav nav-aside">
				<li class="nav-label">Dashboard</li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="tv"></i> <span>Dashboard</span></a></li>
				<li class="nav-label mg-t-25">Content</li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="book-open"></i> <span>Posts</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="folder-plus"></i> <span>Categories</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="bookmark"></i> <span>Tags</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="message-square"></i> <span>Comments</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="file-text"></i> <span>Pages</span></a></li>
				<li class="nav-label mg-t-25">Appearance</li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="aperture"></i> <span>Themes</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="list"></i> <span>Menu Manager</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard/settings/table') }}" class="nav-link"><i data-feather="settings"></i> <span>Settings</span></a></li>
				<li class="nav-label mg-t-25">Component</li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="package"></i> <span>Components</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="command"></i> <span>Clark</span></a></li>
				<li class="nav-label mg-t-25">User</li>
				<li class="nav-item"><a href="{{ url('/dashboard/users/table') }}" class="nav-link"><i data-feather="users"></i> <span>Users</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard/roles/table') }}" class="nav-link"><i data-feather="life-buoy"></i> <span>Roles</span></a></li>
				<li class="nav-item"><a href="{{ url('/dashboard/permissions/table') }}" class="nav-link"><i data-feather="shield"></i> <span>Permissions</span></a></li>
			</ul>
		</div>
    </aside>
	
	<div class="content ht-100v pd-0">
		<div class="content-header">
			<div class="content-search">
				<i data-feather="search"></i>
				<input type="search" class="form-control" placeholder="Search...">
			</div>
			
			<div class="row">
				<nav class="nav mt-2 mr-4 d-none d-sm-block">
					<a href="{{ url('/') }}" class="nav-link" target="_blank" data-toggle="tooltip" data-placement="left" title="View Front Page"><i data-feather="home"></i></a>
				</nav>
				
				<div class="navbar-right pr-3">
					<div class="dropdown dropdown-profile">
						<a href="#" class="dropdown-link" data-toggle="dropdown" data-display="static">
							@if (Auth::user()->picture == '')
							<div class="avatar avatar-sm"><img src="{{ asset('po-admin/assets/img/avatar.jpg') }}" class="rounded-circle" alt=""></div>
							@else
								@if (Auth::user()->hasRole('member'))
									<div class="avatar avatar-sm"><img src="{{ asset('po-content/uploads/users/user-' . Auth::user()->id . '/medium/medium_' . Auth::user()->picture) }}" class="rounded-circle" alt=""></div>
								@else
									<div class="avatar avatar-sm"><img src="{{ asset('po-content/uploads/medium/medium_' . Auth::user()->picture) }}" class="rounded-circle" alt=""></div>
								@endif
							@endif
						</a>
						
						<div class="dropdown-menu dropdown-menu-right tx-13">
							<h6 class="tx-semibold mg-b-5">{{ Auth::user()->name }}</h6>
							<p class="mg-b-25 tx-12 tx-color-03">{{ Auth::user()->email }}</p>
							<a href="{{ url('/dashboard/users/'.Hashids::encode(Auth::user()->id).'/edit') }}" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
							@if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
								<a href="{{ url('/dashboard/settings/table') }}" class="dropdown-item"><i data-feather="settings"></i> Settings</a>
							@endif
							<div class="dropdown-divider"></div>
							<a href="http://www.popojicms.org/contact" class="dropdown-item" target="_blank"><i data-feather="help-circle"></i> Help Center</a>
							<a href="https://www.facebook.com/popojicms/?ref=bookmarks" class="dropdown-item" target="_blank"><i data-feather="life-buoy"></i> Forum</a>
							<a href="javascript:void(0);" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out"></i> Sign Out</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="content-body">
			<div class="container">
				@if (Session::has('flash_message'))
				<div class="alert alert-primary alert-dismissible alert-main" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Info: </strong> {{ Session::get('flash_message') }}
				</div>
				@endif
				
				
				@yield('content')
			</div>
		</div>
	</div>
	
	<div class="modal alertalldel" id="alertalldel" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body m-3 text-center">
					<div class="swal2-icon swal2-warning" style="display:flex;"><span class="swal2-icon-text">!</span></div>
					<h3>Are you sure?</h3>
					<p class="mb-0">You will not be able to recover this entry.</p>
				</div>
				<div class="modal-footer modal-action-footer text-center mb-3">
					<div class="mx-auto" style="width:200px;">
						<button type="button" class="btn btn-danger btn-loading-overlay" id="confirmdel" autofocus>Yes</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('po-admin/lib/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('po-admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('po-admin/lib/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('po-admin/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('po-admin/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('po-admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('po-admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('po-admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
	<script src="{{ asset('po-admin/lib/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('po-admin/lib/sweetalert/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('po-content/filemanager/fancybox/jquery.fancybox.js') }}"></script>
	<script src="{{ asset('po-admin/assets/js/dashforge.aside.js') }}"></script>
	<script src="{{ asset('po-admin/assets/js/dashforge.js') }}"></script>
	<script src="{{ asset('po-admin/assets/js/popoji-main.js') }}"></script>
	<script src="{{ asset('po-admin/lib/js-cookie/js.cookie.js') }}"></script>
	
	@stack('scripts')
</body>
</html>