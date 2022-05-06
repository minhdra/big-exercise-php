<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Suruchi</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

  <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="/assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <!-- <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css"> -->

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

  <!-- Start News letter popup -->
  <!-- <div class="newsletter__popup" data-animation="slideInUp">
    <div id="boxes" class="newsletter__popup--inner">
      <button class="newsletter__popup--close__btn" aria-label="search close button">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
          <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
        </svg>
      </button>
      <div class="box newsletter__popup--box d-flex align-items-center">
        <div class="newsletter__popup--thumbnail">
          <img class="newsletter__popup--thumbnail__img display-block" src="/assets/img/banner/newsletter-popup-thumb2.png" alt="newsletter-popup-thumb">
        </div>
        <div class="newsletter__popup--box__right">
          <h2 class="newsletter__popup--title">Join Our Newsletter</h2>
          <div class="newsletter__popup--content">
            <label class="newsletter__popup--content--desc">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
            <div class="newsletter__popup--subscribe" id="frm_subscribe">
              <form class="newsletter__popup--subscribe__form">
                <input class="newsletter__popup--subscribe__input" type="text" placeholder="Enter you email address here...">
                <button class="newsletter__popup--subscribe__btn">Subscribe</button>
              </form>
              <div class="newsletter__popup--footer">
                <input type="checkbox" id="newsletter__dont--show">
                <label class="newsletter__popup--dontshow__again--text" for="newsletter__dont--show">Don't show this popup again</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- End News letter popup -->

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
  <script src="/assets/js/controllers/cartsController.js"></script>
  @yield('js')

</body>

</html>