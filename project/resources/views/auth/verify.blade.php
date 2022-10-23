<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloudbay is a business unlimited possibilities.">
    <meta name="keywords" content="Cloudbay web app">
    <meta name="author" content="Cloudbay">
    <link rel="icon" href="./assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
    <title>Cloudbay - Verify</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/responsive.css">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div><a class="logo" href="{{ route('home') }}"><img class="img-fluid for-light" src="./assets/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="./assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main"> 

                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="./assets/js/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="./assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="./assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="./assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="./assets/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
    </div>
  </body>

</html>
