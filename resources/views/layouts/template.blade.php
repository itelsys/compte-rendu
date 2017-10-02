@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/metisMenu/metisMenu.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
@yield('main-css')
@endsection

@section('content')
<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
		</div>
		<!-- logo -->
		<div class="navbar-brand">
			<h2>{{ config('app.name', 'Laravel') }}</h2>
		</div>
		<!-- end logo -->
		<div class="navbar-right">
			<!-- search form -->
			<form id="navbar-search" class="navbar-form search-form">
				<input value="" class="form-control" placeholder="Search here..." type="text">
				<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
			</form>
			<!-- end search form -->
			<!-- navbar menu -->
			<div id="navbar-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
							<i class="lnr lnr-question-circle"></i>
						</a>
						<ul class="dropdown-menu user-menu">
							<li class="menu-heading">HOW-TO</li>
							<li><a href="#">Setting up Campaign</a></li>
							<li><a href="#">Understanding Website Analytics</a></li>
							<li><a href="#">Boost Your Sales</a></li>
							<li><a href="#">Knowing Your Audience</a></li>
							<li class="menu-heading">ACCOUNT</li>
							<li><a href="#">Change Password</a></li>
							<li><a href="#">Privacy &amp; Security</a></li>
							<li><a href="#">Membership</a></li>
							<li class="menu-heading">BILLING</li>
							<li><a href="#">Setup Payment</a></li>
							<li><a href="#">Auto-Renewal Program</a></li>
							<li><a href="#">Cancellation</a></li>
							<li class="menu-button">
								<a href="#" class="btn btn-primary"><i class="fa fa-question-circle"></i> HELP CENTER</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- end navbar menu -->
		</div>
	</div>
</nav>
<!-- END NAVBAR -->
<!-- LEFT SIDEBAR -->
<div id="left-sidebar" class="sidebar">
	<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
		<span class="sr-only">Toggle Fullwidth</span>
		<i class="fa fa-angle-left"></i>
	</button>
	<div class="sidebar-scroll">
		<div class="user-account">
			<img src="assets/img/user.png" class="img-responsive img-circle user-photo" alt="User Profile Picture">
			<div class="dropdown">
				<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Salut, <strong>{{Auth::user()->name}}</strong> <i class="fa fa-caret-down"></i></a>
				<ul class="dropdown-menu dropdown-menu-right account">
					<li><a href="#">Mon Profile</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                 Se déconnecter
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                       </form>
                    </li>
				</ul>
			</div>
		</div>
		<nav id="left-sidebar-nav" class="sidebar-nav">
			<ul id="main-menu" class="metismenu">
				<li class=""><a href="#"><i class="lnr lnr-home"></i> <span>Tableau de bord</span></a></li>
				<li class="active"><a href="{{ route('home') }}"><i class="lnr lnr-magic-wand"></i> <span>Lite des taches</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<!-- END LEFT SIDEBAR -->
<!-- MAIN CONTENT -->
<div id="main-content">
	<div class="container-fluid">
		@yield('main-content')
	</div>
</div>
<!-- END MAIN CONTENT -->
@endsection

@section('js')
<!-- Javascript -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
<script src="{{ asset('assets/vendor/metisMenu/metisMenu.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
@yield('main-js')
<script src="{{ asset('assets/scripts/common.js') }}"></script>
@endsection