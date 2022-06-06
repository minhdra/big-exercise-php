<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Login Page - Convex bootstrap 4 admin dashboard template</title>
  <link rel="apple-touch-icon" sizes="60x60" href="/assets/admin/img/ico/apple-icon-60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/admin/img/ico/apple-icon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/assets/admin/img/ico/apple-icon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/admin/img/ico/apple-icon-152.png">
  <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/img/ico/favicon.ico">
  <link rel="shortcut icon" type="image/png" href="/assets/admin/img/ico/favicon-32.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/assets/admin/fonts/feather/style.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/prism.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/toastr.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/css/app.css">
</head>

<body data-col="1-column" class=" 1-column  blank-page blank-page" ng-app="app" >
  <!-- Start preloader -->
  <div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
      <div class="animation-preloader">
        <div class="pre-spinner"></div>
        <div class="txt-loading">
          <span data-text-preloader="L" class="letters-loading">
            L
          </span>

          <span data-text-preloader="O" class="letters-loading">
            O
          </span>

          <span data-text-preloader="A" class="letters-loading">
            A
          </span>

          <span data-text-preloader="D" class="letters-loading">
            D
          </span>

          <span data-text-preloader="I" class="letters-loading">
            I
          </span>

          <span data-text-preloader="N" class="letters-loading">
            N
          </span>

          <span data-text-preloader="G" class="letters-loading">
            G
          </span>
        </div>
      </div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
  </div>
  <!-- End preloader -->
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="wrapper bg-image-primary">
    <!--Login Page Starts-->
    <section id="login">
      <div class="container-fluid" ng-controller="loginController">
        <div class="row full-height-vh">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="card px-4 py-2 box-shadow-2 width-400">
              <div class="card-header text-center">
                <img src="/assets/admin/img/logos/logo-color-big.png" alt="company-logo" class="mb-3" width="80">
                <h4 class="text-uppercase text-bold-400 grey darken-1">Login</h4>
              </div>
              <div class="card-body">
                <div class="card-block">
                  <form>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username" ng-model="item.username" required >
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="password" class="form-control form-control-lg" name="inputPass" id="inputPass" ng-model="item.password" placeholder="Password" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-5">
                            <input type="checkbox" class="custom-control-input" checked id="rememberme">
                            <label class="custom-control-label float-left" for="rememberme">Remember Me</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="text-center col-md-12">
                        <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0" ng-click="login()">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card-footer grey darken-1">
                <div class="text-center mb-1">Forgot Password? <a><b>Reset</b></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Login Page Ends-->
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- BEGIN VENDOR JS-->
  <script src="/assets/admin/vendors/js/core/jquery-3.3.1.min.js"></script>
  <script src="/assets/admin/vendors/js/core/popper.min.js"></script>
  <script src="/assets/admin/vendors/js/core/bootstrap.min.js"></script>
  <script src="/assets/admin/vendors/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="/assets/admin/vendors/js/prism.min.js"></script>
  <script src="/assets/admin/vendors/js/jquery.matchHeight-min.js"></script>
  <script src="/assets/admin/vendors/js/screenfull.min.js"></script>
  <script src="/assets/admin/vendors/js/pace/pace.min.js"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN CONVEX JS-->
  <script src="/assets/admin/js/app-sidebar.js"></script>
  <script src="/assets/admin/js/notification-sidebar.js"></script>
  <script src="/assets/admin/vendors/js/toastr.min.js"></script>
  <!-- END CONVEX JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
  <script src="/assets/js/plugins/angular.min.js"></script>
  <script src="/assets/admin/vendors/js/dirPagination.js"></script>
  
  <script>
    const preLoader = function() {
      let preloaderWrapper = document.getElementById('preloader');
      window.onload = () => {
        preloaderWrapper.classList.add('loaded');
      };
    };
    preLoader();
  </script>

  <!-- Controller -->
  <script src="/assets/js/controllers/InitializationController.js"></script>
  <script src="/assets/js/controllers/globalController.js"></script>
  <script src="/assets/admin/js/app-sidebar.js"></script>
  <script src="/assets/vendor/ckeditor/ckeditor.js"></script>
  <script src="/assets/js/angular-ckeditor.js"></script>
  <script src="/assets/js/controllers/admin/loginController.js"></script>
</body>

</html>