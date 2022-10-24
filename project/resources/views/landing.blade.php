<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloudbay admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cloudbay admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>Cloudbay</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
  </head>
  <body class="landing-page">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start            -->
      <div class="landing-home">
        <ul class="decoration">
          <li class="one"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/1.png') }}" alt=""></li>
          <li class="two"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/2.png') }}" alt=""></li>
          <li class="three"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/4.png') }}" alt=""></li>
          <li class="four"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/3.png') }}" alt=""></li>
          <li class="five"><img class="img-fluid" src="{{ asset('assets/images/landing/2.png') }}" alt=""></li>
          <li class="six"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/cloud.png') }}" alt=""></li>
          <li class="seven"><img class="img-fluid" src="{{ asset('assets/images/landing/2.png') }}" alt=""></li>
        </ul>
        <div class="container-fluid">
          <div class="sticky-header">
            <header>                       
              <nav class="navbar navbar-b navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a class="navbar-brand p-0" href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/login.png') }}" alt=""></a>
                <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <div class="navbar-collapse justify-content-end collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                    <a href="{{ route('register') }}"><button class="btn btn-info " type="submit" title="">Sign Up</button></a>
                  </ul>
                </div>
              </nav>
            </header>
          </div>
          <div class="row">
            <div class="col-xl-5 col-lg-6">
              <div class="content">
                <div>
                  <h1 class="wow fadeIn">A social e-commerce platform connecting businesses, connecting lives.</h1>
                  <h5 class="mt-3 wow fadeIn">Do business and more!</h5>
                  <p class="mt-5 wow fadeIn">Cloudbay empowering over 300 billion business to reach 3 million customers</p>
                </div>
              </div>
            </div>


            <div class="col-xl-7 col-lg-6">                 
             
              <div class="login-card login1">
                <div>
                  <div class="login-main"> 
                    
                    <form class="theme-form" method="POST" action="{{ route('login') }}">
                      @csrf
                      <h4>Sign in to account</h4>
                      <p>Enter your email & password to login</p>
                      <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required="" placeholder="Test@gmail.com" value="{{ old('email') }}" autocomplete="email" autofocus>
    
                        @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                          <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********" autocomplete="current-password">
                          <div class="show-hide"><span class="show">                         </span></div>
    
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group mb-0">
                        <div class="checkbox p-0">
                          {{-- <input id="checkbox1" type="checkbox"> --}}
                          <input class="form-check-input" type="checkbox" name="remember" id="checkbox1" {{ old('remember') ? 'checked' : '' }}>
                          <label class="text-muted" for="checkbox1">Remember password</label>
                        </div><a class="link" href="forget-password.html">Forgot password?</a>
                        <div class="text-end mt-3">
                          <button class="btn btn-info btn-block w-100" type="submit">Sign in</button>
                        </div>
                      </div>
                      {{-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                      <div class="social mt-4">
                        <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                      </div> --}}
                      <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer-bg">
        <div class="container">
          <div class="landing-center pt-5 pb-3">
            <div class="title"><img class="img-fluid" src="{{ asset('assets/images/logo/login.png') }}" alt=""></div>
            <div class="footer-content">
              <!-- <h1>Cloudbay empowering over 300 billion business to reach 3 million customers</h1> -->
              <p>Copyright 2021 © Cloudbay. all Right Reserved.</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/landing_sticky.js') }}"></script>
    <script src="{{ asset('assets/js/landing.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>

</html>