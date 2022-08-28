{{-- @php
  $darkmode = (
@endphp --}}
<!DOCTYPE html>
<html lang="en" >
  
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Cloudbay ">
    <meta name="keywords" content=" Cloudbay ">
    <meta name="author" content="Cloudbay">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>Cloudbay- @yield('title')</title>

 
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    
    @yield('style')
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
  </head>
  <body class="{{ (Auth::user()->dark_mode) ? 'dark-only' : ' ' }}">
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <a href="{{ route('markets') }}"><div class=" shop-tap"><i class="icofont icofont-food-cart"></i></div></a>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cloudbay .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a></div>
            
          </div>
          <div class="d-flex justify-content-between p-0">

            <div class="left-header col horizontal-wrapper ps-0">
              <h3 > <strong>@yield('title')</strong> <h3>
             
            </div>
            <div class="nav-right col-8 pull-right right-header p-0">
              <ul class="nav-menus">
               
                <li>                         
                  <span class="header-search"><i data-feather="search"></i></span></li>
                <li class="onhover-dropdown">
                  <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary">4                                </span></div>
                  <ul class="notification-dropdown onhover-show-div">
                    <li><i data-feather="bell"></i>
                      <h6 class="f-18 mb-0">Notitications</h6>
                    </li>
                    <li>
                      <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
                    </li>
                    <li>
                      <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
                    </li>
                    <li>
                      <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
                    </li>
                    <li>
                      <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
                    </li>
                    <li><a class="btn btn-info" href="#">Check all notification</a></li>
                  </ul>
                </li>
                {{-- <li class="onhover-dropdown">
                  <div class="notification-box"><i data-feather="star"></i></div>
                  <div class="onhover-show-div bookmark-flip">
                    <div class="flip-card">
                      <div class="flip-card-inner">
                        <div class="front">
                          <ul class="droplet-dropdown bookmark-dropdown">
                            <li class="gradient-primary"><i data-feather="star"></i>
                              <h6 class="f-18 mb-0">Bookmark</h6>
                            </li>
                            <li>
                              <div class="row">
                                <div class="col-4 text-center"><i data-feather="file-text"></i></div>
                                <div class="col-4 text-center"><i data-feather="activity"></i></div>
                                <div class="col-4 text-center"><i data-feather="users"></i></div>
                                <div class="col-4 text-center"><i data-feather="clipboard"></i></div>
                                <div class="col-4 text-center"><i data-feather="anchor"></i></div>
                                <div class="col-4 text-center"><i data-feather="settings"></i></div>
                              </div>
                            </li>
                            <li class="text-center">
                              <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                            </li>
                          </ul>
                        </div>
                        <div class="back">
                          <ul>
                            <li>
                              <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                                <input type="text" placeholder="search...">
                              </div>
                            </li>
                            <li>
                              <button class="d-block flip-back" id="flip-back">Back</button>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li> --}}
                <li>
                  <div class="mode"  data-dark="{{ Auth::user()->dark_mode  }}"><i class="fa {{ (Auth::user()->dark_mode ) ? 'fa-lightbulb-o' : 'fa-moon-o'  }}"></i></div>
                </li>
                <li class="cart-nav onhover-dropdown">
                  <div class="cart-box"><i data-feather="shopping-cart"></i><span id="cart-count" class="badge rounded-pill badge-primary">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span></div>
                  <ul id="cart-items" class="cart-dropdown list-scroll onhover-show-div" >

                      @include('front.product.load.mini-cart')

                  </ul>
                  </li>
                  <li class="onhover-dropdown"><i data-feather="message-square"></i>
                  <ul class="chat-dropdown onhover-show-div">
                    
                    
                    
                  </ul>
                </li>
                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                  <div class="media profile-media"><img class="b-r-10" height="37" width="37" src="{{ (Auth::user()->attachments) ? asset('assets/uploads/').'/'.Auth::user()->attachments['path'] : asset('assets/images/dashboard/profile.jpg') }}" alt="">
                    <div class="media-body authuser" data-id="{{ Auth::user()->id }}"><span>{{ Auth::user()->username }}</span>
                      <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                    </div>
                  </div>
                  <ul class="profile-dropdown onhover-show-div">
                    <li><a href="{{ 'profile/'.Auth::user()->username }}"><i data-feather="user"></i><span>Account </span></a></li>
                    <li><a href="{{ route('editProfile') }}"><i data-feather="settings"></i><span>Settings</span></a></li>
                    <li>
                        <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i data-feather="log-in"> </i><span>{{ __('Logout') }}</span>
                                        
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </li>
                  </ul>
                </li>
                <li><div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
                  </li>
              </ul>
            </div>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            {{-- <!-- <div class="ProfileCard-realName">{{name}}</div> --> --}}
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper"><a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                 
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i data-feather="home"> </i><span>Home</span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('feeds') }}"><i data-feather="list"> </i><span>Feeds</span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="wallet.html"><i data-feather="book"> </i><span>Wallet</span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('chat') }}"><i data-feather="message-circle" > </i><span id="message-sidebar" class="">Massaging</span></a></li>

                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ 'profile/'.Auth::user()->username }}"><i data-feather="user"> </i><span>Profile</span></a></li>

                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="package"></i><span class="">My Orders</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{ route('product-wishlists') }}">Wishlist</a></li>
                      <li><a href="{{ route('order.history') }}">Orders</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('editProfile') }}"><i data-feather="settings"> </i><span>Account Setting</span></a></li>

                  <li class="mega-menu"><a class="sidebar-link sidebar-title" href="#"><i data-feather="layers"></i><span>Pages</span></a>
                    <div class="mega-menu-container menu-content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Product Page</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="cart.html" target="_blank">Cart</a></li>
                                <li><a href="checkout.html" target="_blank">checkout</a></li>
                                <li><a href="product.html" target="_blank">Products</a></li>
                                <li><a href="product-page.html" target="_blank">Product details</a></li>
                                <li><a href="order-history.html" target="_blank">order-history</a></li>
                                <li><a href="wishlist.html" target="_blank">wishlist</a></li>
                                <li><a href="wallet.html" target="_blank">wallet</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5> Other Pages</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="landing-page.html" target="_blank">Landing Page</a></li>
                                <li><a href="user-profile.html" target="_blank">profile page</a></li>
                                <li><a href="feed.html" target="_blank">Feed page</a></li>
                                <li><a href="messaging.html" target="_blank">Message</a></li>
                                <li><a href="login.html" target="_blank">Login</a></li>
                                <li><a href="sign-up.html" target="_blank">Register</a></li>
                                <li><a href="unlock.html" target="_blank">Unlock User</a></li>
                                <li><a href="forget-password.html" target="_blank">Forget Password</a></li>
                                <li><a href="reset-password.html" target="_blank">Reset Password</a></li>
                                <li><a href="maintenance.html" target="_blank">Maintenance</a></li>
                                <li><a href="comingsoon.html" target="_blank">Coming Simple</a></li>
                                <li><a href="error-400.html" target="_blank">Error 400</a></li>
                                <li><a href="search.html" target="_blank">Search</a></li>
                                <li><a href="settings.html" target="_blank">Setting</a></li>
                                <li><a href="pricing.html" target="_blank">Become a Seller</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Local Business</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="favorite.html" target="_blank">Favorite</a></li>
                                <li><a href="market.html" target="_blank">Market</a></li>
                                <li><a href="market_view.html" target="_blank">Store</a></li>
                                <li><a href="market_feeds.html" target="_blank">store feed</a></li>
                                <li><a href="market_product.html" target="_blank">store product</a></li>
                                <li><a href="hotels.html" target="_blank">Hotels</a></li>
                                <li><a href="hotel_view.html" target="_blank">Hotel view</a></li>
                                <li><a href="hotel_feeds.html" target="_blank">Hotel feed</a></li>
                                <li><a href="hotel-reviews.html" target="_blank">Hotel reveiws</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Find Ride</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="find-ride.html" target="_blank">Find rides</a></li>
                                <li><a href="riders-profile-link.html" target="_blank">rider view</a></li>
                                <li><a href="pickups.html" target="_blank">pickups</a></li>
                                <li><a href="pickups_profile.html" target="_blank">pickups view</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Find Skill</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="artist.html" target="_blank">Artists</a></li>
                                <li><a href="artist-profile.html" target="_blank">Artist profile</a></li>
                                <li><a href="artist-feeds.html" target="_blank">Artist feeds</a></li>
                                <li><a href="artist-reviews.html" target="_blank">Artist reviews</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Chat</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="chatroom.html" target="_blank">Chatrooms</a></li>
                                <li><a href="chatscreen.html" target="_blank">Chat</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>

                  <li class="sidebar-main-title m-t-50">
                    <div>
                      <h6>Contact</h6>
                      <p>Supports & info </p>
                    </div>
                  </li>
                  
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="pricing.html"><span> Become a Seller </span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><span> Customer Support </span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><span>Knowledgebase</span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><span>Terms & Condition</span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><span>What's New</span></a></li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><span>About  -  <code>version 1.0</code></span></a></li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->

            @yield('content')


          <!-- footer start-->
          <footer class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                  <p class="mb-0">Copyright 2021 © Cloudbay. all Right Reserved.  </p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
     
      <script type="text/javascript">
        var mainurl = "{{url('/')}}";
        var gs      = {!! json_encode(\App\Models\Generalsetting::first()) !!};
      </script>

      <!-- latest jquery-->
      <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
      <!-- Bootstrap js-->
      <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
      <!-- feather icon js-->
      <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
      <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
      <!-- scrollbar js-->
      <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
      <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
      <!-- Sidebar jquery-->
      <script src="{{ asset('assets/js/config.js') }}"></script>
      <!-- Plugins JS start-->
      <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
      <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
      <script src="{{ asset('assets/js/owlcarousel/owl-custom.js') }}"></script>
      <script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
      <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
      <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
      <script src="{{ asset('js/chat/pusher.min.js') }}"></script>
      <script>
        // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;

        var pusher = new Pusher("{{ config('chat.pusher.key') }}", {
          // encrypted: true,
          cluster: "{{ config('chat.pusher.options.cluster') }}",
          authEndpoint: '{{route("pusher.auth")}}',
          // authEndpoint: '{{route("pusher.auth")}}',
          forceTLS: false,
          wsHost: window.location.hostname,
          wsPort: 6001,
          auth: {
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          }
        });

      </script>
      {{-- <script src="{{ asset('assets/js/notify/index.js') }}"></script> --}}

      
      {{-- <script src="{{ asset('assets/js/dashboard/default.js') }}"></script> --}}
  
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{ asset('assets/js/script.js') }}"></script>
      @yield('script')

      {{-- @if(Session::get('msg'))
      <script>
        notice({{ Session::get('msg') }});
      </script>
      @endif --}}

      


    </body>
  
  </html>