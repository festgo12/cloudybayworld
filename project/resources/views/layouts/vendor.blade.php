<!doctype html>
<html lang="en" dir="ltr">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		
		<title>Vendor Dashbord - Cloudbay</title>
		<!-- favicon -->
		<link rel="icon"  type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}"/>
		<!-- Bootstrap -->
		<link href="{{asset('assets/vendor/css/bootstrap.min.css')}}" rel="stylesheet" />
		<!-- Fontawesome -->
		<link rel="stylesheet" href="{{asset('assets/vendor/css/fontawesome.css')}}">
		<!-- icofont -->
		<link rel="stylesheet" href="{{asset('assets/vendor/css/icofont.min.css')}}">
		<!-- Sidemenu Css -->
		<link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/vendor/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets/vendor/css/plugin.css')}}" rel="stylesheet" />

		<link href="{{asset('assets/vendor/css/jquery.tagit.css')}}" rel="stylesheet" />
    	<link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap-coloroicker.css') }}">
		<!-- Main Css -->



	<link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/admin/css/common.css')}}" rel="stylesheet" />



		@yield('styles')

	</head>
	<body>
		<div class="page">
			<div class="page-main">
				<!-- Header Menu Area Start -->
				<div class="header">
					<div class="container-fluid">
						<div class="d-flex justify-content-between">
						<a class="admin-logo" href="{{ route('home') }}" target="_blank">
							<img src="{{asset('assets/images/logo/logo.png')}}" alt="">
							</a>
							<div class="menu-toggle-button">
								<a class="nav-link" href="javascript:;" id="sidebarCollapse">
									<div class="my-toggl-icon">
											<span class="bar1"></span>
											<span class="bar2"></span>
											<span class="bar3"></span>
									</div>
								</a>
							</div>

							<div class="right-eliment">
								<ul class="list">

									<li class="bell-area">
										<a id="notf_order" class="dropdown-toggle-1" href="javascript:;">
											<i class="icofont-cart"></i>
											<span data-href="{{ route('vendor-order-notf-count',Auth::guard('web')->user()->id) }}" id="order-notf-count">{{ DB::table('notifications')->where('type','App\Notifications\newOrderCreated')->count() }}</span>
										</a>
										<div class="dropdown-menu">
											<div class="dropdownmenu-wrapper" data-href="{{ route('vendor-order-notf-show',Auth::guard('web')->user()->id) }}" id="order-notf-show">
										</div>
										</div>
									</li>

									<li class="login-profile-area">
										<a class="dropdown-toggle-1" href="javascript:;">
											<div class="user-img">
             
              <img src="{{ Auth::user()->attachments ? asset('assets/uploads/'.Auth::user()->attachments['path'] ):asset('assets/images/noimage.png') }}" alt="">
             
			  
											</div>
										</a>
										<div class="dropdown-menu">
											<div class="dropdownmenu-wrapper">
													<ul>
														<h5>{{ __('Welcome!') }}</h5>

															<li>
																<a target="_blank" href="{{ route('marketDetails',str_replace(' ', '-', Auth::user()->shop->slug)) }}"><i class="fas fa-eye"></i> {{ __('View Shop!') }}</a>
															</li>

															{{-- <li>
																<a href="{{ route('user-dashboard') }}"><i class="fas fa-sign-in-alt"></i> {{ __('User Panel') }}</a>
															</li> --}}

															<li>
																<a href="{{ route('vendor-profile') }}"><i class="fas fa-user"></i> {{ __('Edit Profile') }}</a>
															</li>
															{{-- <li>
																<a href="{{ route('user-logout') }}"><i class="fas fa-power-off"></i>{{ __('Logout!') }}</a>
															</li> --}}

														</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Header Menu Area End -->
				<div class="wrapper">
					<!-- Side Menu Area Start -->
					<nav id="sidebar" class="nav-sidebar">
						<ul class="list-unstyled components" id="accordion">

							<li>
								<a target="_blank" href="{{  route('marketDetails',str_replace(' ', '-', Auth::user()->shop->slug))  }}" class="wave-effect"><i class="fas fa-eye mr-2"></i> {{ __('View Shop!') }}</a>
							</li>

							<li>
								<a href="{{ route('vendor-dashboard') }}" class="wave-effect "><i class="fa fa-home mr-2"></i>{{ __('Dashboard') }}</a>
							</li>
							<li>
								<a href="#order" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i class="fas fa-hand-holding-usd"></i>{{ __('Orders') }}</a>
								<ul class="collapse list-unstyled" id="order" data-parent="#accordion" >
                                   	<li>
                                    	<a href="{{route('vendor-order-index')}}"> {{ __('All Orders') }}</a>
                                	</li>
								</ul>
							</li>

							<li>
								<a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="icofont-cart"></i>{{ __('Products') }}
								</a>
								<ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
									<li>
										<a href="{{ route('vendor-prod-types') }}"><span>{{ __('Add New Product') }}</span></a>
									</li>
									<li>
										<a href="{{ route('vendor-prod-index') }}"><span>{{ __('All Products') }}</span></a>
									</li>
									{{-- <li>
										<a href="{{ route('admin-vendor-catalog-index') }}"><span>{{ __('Product Catalogs') }}</span></a>
									</li> --}}
								</ul>
							</li>

							

							<li>
								<a href="{{ route('vendor-wt-index') }}" class=" wave-effect"><i class="fas fa-list"></i>Withdraws</a>
							</li>
							

							<li>
								<a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-cogs"></i>{{ __('Setting') }}
								</a>
								<ul class="collapse list-unstyled" id="general" data-parent="#accordion">
                                    <li>
                                    	<a href="{{ route('vendor-profile') }}"><span>{{ __('Shop Settings') }}</span></a>
                                    </li>
                                   

									{{-- <li>
										<a href="{{ route('vendor-shipping-index') }}"><span> {{ __('Shipping Method') }} </span></a>
									</li> --}}
									
								</ul>
							</li>

						</ul>
					</nav>
					<!-- Main Content Area Start -->
					@yield('content')
					<!-- Main Content Area End -->
					</div>
				</div>
			</div>

		@php
		  $curr = \App\Models\Currency::where('is_default','=',1)->first();
		@endphp

		<script type="text/javascript">

		  var mainurl = "{{url('/')}}";
		  var admin_loader = {{ $gs->is_admin_loader }};
		
			var getattrUrl = '{{ route('vendor-prod-getattributes') }}';
			var curr = {!! json_encode($curr) !!};

		</script>

		<!-- Dashboard Core -->
		<script src="{{asset('assets/vendor/js/vendors/jquery-1.12.4.min.js')}}"></script>
		<script src="{{asset('assets/vendor/js/vendors/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/vendor/js/jqueryui.min.js')}}"></script>
		<!-- Fullside-menu Js-->
		<script src="{{asset('assets/vendor/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets/vendor/plugins/fullside-menu/waves.min.js')}}"></script>

		<script src="{{asset('assets/vendor/js/plugin.js')}}"></script>

		<script src="{{asset('assets/vendor/js/Chart.min.js')}}"></script>
		<script src="{{asset('assets/vendor/js/tag-it.js')}}"></script>
		<script src="{{asset('assets/vendor/js/nicEdit.js')}}"></script>
        <script src="{{asset('assets/vendor/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{asset('assets/vendor/js/notify.js') }}"></script>
		<script src="{{asset('assets/vendor/js/load.js')}}"></script>
		<!-- Custom Js-->
		<script src="{{asset('assets/vendor/js/custom.js')}}"></script>
		<!-- AJAX Js-->
		<script src="{{asset('assets/vendor/js/myscript.js')}}"></script>
		@yield('scripts')

@if($gs->is_admin_loader == 0)
<style>
	div#geniustable_processing {
		display: none !important;
	}
</style>
@endif

	</body>

</html>
