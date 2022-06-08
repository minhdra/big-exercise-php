<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Dra - Shop</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/img/ico/favicon.ico">
  <link rel="shortcut icon" type="image/png" href="/assets/admin/img/ico/favicon-32.png">

  <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="/assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <!-- <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css"> -->

  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/toastr.css">
  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body ng-app="app">

  <!-- Start preloader -->
  <div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
      <div class="animation-preloader">
        <div class="spinner"></div>
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

  <!-- Start header area -->
  @include('includes.client.header')
  <!-- End header area -->

  @yield('content')

  <!-- Start footer section -->
  @include('includes.client.footer')
  <!-- End footer section -->

  <!-- Scroll top bar -->
  <button id="scroll__top">
    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
    </svg>
  </button>

  <!-- All Script JS Plugins here  -->
  <script src="/assets/js/plugins/jquery.min.js"></script>
  <script src="/assets/admin/vendors/js/core/popper.min.js"></script>
  <script src="/assets/admin/vendors/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/angular.min.js"></script>
  <script src="/assets/js/plugins/dirPagination.js"></script>
  <!-- <script src="/assets/js/vendor/popper.js" defer="defer"></script>
  <script src="/assets/js/vendor/bootstrap.min.js" defer="defer"></script> -->
  <script src="/assets/admin/vendors/js/toastr.min.js"></script>

  <script src="/assets/js/plugins/swiper-bundle.min.js"></script>
  <script src="/assets/js/plugins/glightbox.min.js"></script>

  <!-- Customscript js -->
  <script src="/assets/js/script.js"></script>

  <!-- Controller -->
  <script src="/assets/js/controllers/InitializationController.js"></script>
  <script src="/assets/js/controllers/headerClientController.js"></script>
  <script src="/assets/js/controllers/CartsController.js"></script>
  <script src="/assets/vendor/ckeditor/ckeditor.js"></script>
  <script src="/assets/js/angular-ckeditor.js"></script>
  @yield('js')

</body>

</html>