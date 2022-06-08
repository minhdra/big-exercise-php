<html lang="en">

<head>
  <style data-merge-styles="true"></style>
  <meta charset="utf-8">
  <title>Suruchi - Checkout</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/img/ico/favicon.ico">
  <link rel="shortcut icon" type="image/png" href="/assets/admin/img/ico/favicon-32.png">

  <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="/assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <!-- <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css"> -->

  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body ng-app="app" ng-controller="checkoutController">

  <!-- Start preloader -->
  <div id="preloader" class="loaded">
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

  <!-- Start checkout page area -->
  <div class="checkout__page--area">
    <div class="container">
      <div class="checkout__page--inner d-flex">
        <!-- Payment -->
        <div class="main checkout__mian">
          <header class="main__header checkout__mian--header mb-30">
            <h1 class="main__logo--title"><a class="logo logo__left mb-20" href="{{route('index')}}"><img src="/assets/img/logo/nav-log.png" alt="logo"></a></h1>
            <details class="order__summary--mobile__version">
              <summary class="order__summary--toggle border-radius-5">
                <span class="order__summary--toggle__inner">
                  <span class="order__summary--toggle__icon">
                    <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                    </svg>
                  </span>
                  <span class="order__summary--toggle__text show">
                    <span>Show order summary</span>
                    <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor">
                      <path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path>
                    </svg>
                  </span>
                  <span class="order__summary--final__price">$@{{total}}</span>
                </span>
              </summary>
              <div class="order__summary--section">
                <div class="cart__table checkout__product--table">
                  <table class="summary__table">
                    <tbody class="summary__table--body">
                      <tr class=" summary__table--items" ng-repeat="row in customer.cart_details">
                        <td class=" summary__table--list">
                          <div class="product__image two  d-flex align-items-center">
                            <div class="product__thumbnail border-radius-5">
                              <a href="/shop/@{{row.product_id}}"><img class="border-radius-5" ng-src="/assets/img/products/@{{row.image}}" alt="cart-product"></a>
                              <span class="product__thumbnail--quantity">@{{row.quantity}}</span>
                            </div>
                            <div class="product__description">
                              <h3 class="product__description--name h4"><a href="/shop/@{{row.product_id}}">@{{row.product.name}}</a></h3>
                              <span class="product__description--variant">COLOR: @{{row.color}}</span>
                            </div>
                          </div>
                        </td>
                        <td class=" summary__table--list">
                          <span class="cart__price">@{{row.quantity*row.single_price}}</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="checkout__discount--code">
                  <form class="d-flex" action="#">
                    <label>
                      <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code" type="text" spellcheck="false" data-ms-editor="true">
                    </label>
                    <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
                  </form>
                </div>
                <div class="checkout__total">
                  <table class="checkout__total--table">
                    <tbody class="checkout__total--body">
                      <!-- <tr class="checkout__total--items">
                        <td class="checkout__total--title text-left">Subtotal </td>
                        <td class="checkout__total--amount text-right">$860.00</td>
                      </tr> -->
                      <tr class="checkout__total--items">
                        <td class="checkout__total--title text-left">Shipping</td>
                        <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                      </tr>
                    </tbody>
                    <tfoot class="checkout__total--footer">
                      <tr class="checkout__total--footer__items">
                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$@{{total}}</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </details>
            <nav>
              <ol class="breadcrumb checkout__breadcrumb d-flex">
                <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                  <a class="breadcrumb__link" href="{{route('cart')}}">Cart</a>
                  <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                  </svg>
                </li>

                <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                  <a class="breadcrumb__link" href="{{route('cart')}}">Checkout</a>

                  <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                  </svg>
                </li>
                <li class="breadcrumb__item breadcrumb__item--blank d-flex align-items-center">
                  <span class="breadcrumb__text current">Payment</span>
                </li>
              </ol>
            </nav>
          </header>
          <main class="main__content_wrapper mb-20" ng-if="!order">
            <div>
              <div class="checkout__content--step checkout__contact--information2 border-radius-5">
                <div class="checkout__review d-flex justify-content-between align-items-center">
                  <div class="checkout__review--inner d-flex align-items-center" ng-if="delivery_address">
                    <label class="checkout__review--label">Contact</label>
                    <span class="checkout__review--content">@{{delivery_address.full_name}}, @{{delivery_address.phone_number}}</span>
                  </div>
                  <div class="checkout__review--inner d-flex align-items-center" ng-if="!delivery_address">
                    <span class="checkout__review--content">You must choose default delivery address</span>
                  </div>
                  <div class="checkout__review--link">
                    <button class="checkout__review--link__text" type="button" ng-click="showDeliveryAddresses()">Change</button>
                  </div>
                </div>
                <div class="checkout__review d-flex justify-content-between align-items-center" ng-if="delivery_address">
                  <div class="checkout__review--inner d-flex align-items-center">
                    <label class="checkout__review--label"> Ship to</label>
                    <span class="checkout__review--content">@{{delivery_address.commune}}, @{{delivery_address.district}}, @{{delivery_address.province}}</span>
                  </div>
                </div>
              </div>
            </div>
          </main>
          <div class="checkout__content--step__footer d-flex align-items-center" ng-if="!order">
            <button class="continue__shipping--btn primary__btn border-radius-5" ng-click="payment()">Pay now</button>
            <a class="previous__link--content" href="/shop">Return shop</a>
          </div>

          <main class="main__content_wrapper" ng-if="order">
            <div>
              <div class="checkout__content--step section__shipping--address pt-0">
                <div class="section__header checkout__header--style3 position__relative mb-25">
                  <span class="checkout__order--number">Order #@{{order.id}}</span>
                  <h2 class="section__header--title h3">Thank you submission</h2>
                  <div class="checkout__submission--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.995" height="25.979" viewBox="0 0 512 512">
                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M416 128L192 384l-96-96"></path>
                    </svg>
                  </div>
                </div>
                <div class="order__confirmed--area border-radius-5 mb-15">
                  <h3 class="order__confirmed--title h4">Your order is confirmed</h3>
                  <p class="order__confirmed--desc">You,ll receive a confirmation call</p>
                </div>
                <div class="customer__information--area border-radius-5">
                  <h3 class="customer__information--title h4">Customer Information</h3>
                  <div class="customer__information--inner d-flex">
                    <div class="customer__information--list">
                      <div class="customer__information--step">
                        <h4 class="customer__information--subtitle h5">Contact information</h4>
                        <ul>
                          <li><span class="customer__information--text">@{{delivery_address.full_name}}, @{{delivery_address.phone_number}}</span></li>
                        </ul>
                      </div>
                      <div class="customer__information--step">
                        <h4 class="customer__information--subtitle h5">Shipping address</h4>
                        <ul>
                          <li><span class="customer__information--text">@{{delivery_address.specific_address}}</span></li>
                          <li><span class="customer__information--text">@{{delivery_address.commune}}</span></li>
                          <li><span class="customer__information--text">@{{delivery_address.district}}</span></li>
                          <li><span class="customer__information--text">@{{delivery_address.province}}</span></li>
                        </ul>
                      </div>

                    </div>
                    <div class="customer__information--list">
                      <div class="customer__information--step">
                        <h4 class="customer__information--subtitle h5">Payment method</h4>
                        <ul>
                          <li><span class="customer__information--text">Payment after shipping</span></li>
                        </ul>
                      </div>
                      <div class="customer__information--step">
                        <h4 class="customer__information--subtitle h5">Shipping method</h4>
                        <ul>
                          <li><span class="customer__information--text">@{{delivery_address.specific_address}}</span></li>
                          <li><span class="customer__information--text">@{{delivery_address.commune}}</span></li>
                          <li><span class="customer__information--text">@{{delivery_address.district}}</span></li>
                          <li><span class="customer__information--text">@{{delivery_address.province}}</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="checkout__content--step__footer d-flex align-items-center">
              <a class="previous__link--content" href="/my-account">Your orders</a>
            </div>
          </main>
          <footer class="main__footer checkout__footer">
            <p class="copyright__content">Copyright © 2022 <a class="copyright__content--link text__primary" href="{{route('index')}}">Suruchi</a> . All Rights Reserved.Design By Suruchi</p>
          </footer>
        </div>
        <!-- Bill -->
        <aside class="checkout__sidebar sidebar">
          <div class="cart__table checkout__product--table">
            <table class="cart__table--inner">
              <tbody class="cart__table--body">
                <tr class="cart__table--body__items" ng-repeat="row in customer.cart_details">
                  <td class="cart__table--body__list">
                    <div class="product__image two  d-flex align-items-center">
                      <div class="product__thumbnail border-radius-5">
                        <a href="/shop/@{{row.product_id}}"><img class="border-radius-5" ng-src="/assets/img/products/@{{row.image}}" alt="cart-product"></a>
                        <span class="product__thumbnail--quantity">@{{row.quantity}}</span>
                      </div>
                      <div class="product__description">
                        <h3 class="product__description--name h4"><a href="/shop/@{{row.product_id}}">@{{row.product.name}}</a></h3>
                        <span class="product__description--variant">COLOR: @{{row.color}}</span>
                      </div>
                    </div>
                  </td>
                  <td class="cart__table--body__list">
                    <span class="cart__price">$@{{row.quantity*row.single_price}}</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="checkout__discount--code">
            <div class="d-flex" action="#">
              <label>
                <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code" type="text" spellcheck="false" data-ms-editor="true">
              </label>
              <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
            </div>
          </div>
          <div class="checkout__total">
            <table class="checkout__total--table">
              <tbody class="checkout__total--body">
                <!-- <tr class="checkout__total--items">
                  <td class="checkout__total--title text-left">Subtotal </td>
                  <td class="checkout__total--amount text-right">$860.00</td>
                </tr> -->
                <tr class="checkout__total--items">
                  <td class="checkout__total--title text-left">Shipping</td>
                  <td class="checkout__total--calculated__text text-right">Free</td>
                </tr>
              </tbody>
              <tfoot class="checkout__total--footer">
                <tr class="checkout__total--footer__items">
                  <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                  <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$@{{total}}</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <!-- End checkout page area -->

  <!-- Start modal -->
  <div class="modal" id="modal1" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper" style="min-width: 600px; min-height: 250px; overflow: auto;">
      <header class="modal-header quickview__header">
        <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
      </header>
      <div class="quickview__inner">
        <h3 class="h3 mb-20">Your delivery addresses</h3>
        <div class="" ng-if="customer.delivery_addresses.length > 0">
          <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="col-12 mb-20" ng-repeat="row in customer.delivery_addresses">
              <div class="d-flex align-items-center justify-content-between">
                <input type="radio" name="address" id="address@{{$index}}" ng-checked="row.status" ng-click="changeDefault(row)">
                <label for="address@{{$index}}">
                  <div>@{{row.full_name}}, @{{row.phone_number}}</div>
                  <div>@{{delivery_address.commune}}, @{{delivery_address.district}}, @{{delivery_address.province}}</div>
                </label>
                <div style="width:50px">@{{row.status===0?'':'Default'}}</div>
                <button class="checkout__review--link__text" type="button" ng-click="showUpdateDeliveryAddress(row)">Change</button>
              </div>
            </div>
            <div class="col-12 btn-group text-right">
              <button class="primary__btn minicart__button--link" ng-click="showUpdateDeliveryAddress()">Add more</button>
            </div>
          </div>
        </div>
        <div class="" ng-if="customer.delivery_addresses.length === 0">
          <div class="d-flex flex-column align-items-center justify-content-center" style="height: 180px">
            <h5 class="">You haven't any delivery address</h5>
            <button class="primary__btn minicart__button--link" ng-click="showUpdateDeliveryAddress()">Add now</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal -->
  <!-- Start modal -->
  <div class="modal" id="modal2" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper" style="min-width: 500px; min-height: 250px; overflow: auto;">
      <header class="modal-header quickview__header">
        <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
      </header>
      <div class="quickview__inner">
        <h3 class="mb-20 h3">@{{modalTitle}}</h3>
        <div class="section__shipping--address__content">
          <div class="row">
            <div class="col-lg-6 mb-12">
              <div class="checkout__input--list ">
                <label>
                  <input class="checkout__input--field border-radius-5" placeholder="Full name" type="text" spellcheck="false" ng-model="full_name" data-ms-editor="true">
                </label>
              </div>
            </div>
            <div class="col-lg-6 mb-12">
              <div class="checkout__input--list">
                <label>
                  <input class="checkout__input--field border-radius-5" placeholder="Phone number" type="number" spellcheck="false" ng-model="phone_number" data-ms-editor="true">
                </label>
              </div>
            </div>
            <div class="col-4 mb-12">
              <div class="checkout__input--list checkout__input--select select">
                <label class="checkout__select--label" for="country">Cities</label>
                <select class="checkout__input--select__field border-radius-5" ng-options="row.code as row.name_with_type for row in cities" ng-model="city_code" ng-change="changeCity()" id="country">
                </select>
              </div>
            </div>
            <div class="col-4 mb-12">
              <div class="checkout__input--list checkout__input--select select">
                <label class="checkout__select--label" for="district">Districts</label>
                <select class="checkout__input--select__field border-radius-5" ng-options="row.code as row.name_with_type for row in districts" ng-model="district_code" ng-change="changeDistrict()" id="district">
                </select>
              </div>
            </div>
            <div class="col-4 mb-12">
              <div class="checkout__input--list checkout__input--select select">
                <label class="checkout__select--label" for="country">Communes</label>
                <select class="checkout__input--select__field border-radius-5" ng-options="row.name_with_type as row.name_with_type for row in communes" ng-model="commune" id="country">
                </select>
              </div>
            </div>
            <div class="col-12 mb-12">
              <div class="checkout__input--list">
                <label>
                  <input class="checkout__input--field border-radius-5" placeholder="Specific address" type="text" spellcheck="false" ng-model="specific_address" data-ms-editor="true">
                </label>
              </div>
            </div>
            <div class="col-12 mb-12">
              <fieldset class="variant__input--fieldset weight text-right">
                <input id="home" name="type_address" type="radio" ng-checked="checkType===0">
                <label class="variant__size--value red" ng-click="getTypeAddress($event)" style="width: auto; padding: .25rem" for="home">Private home</label>
                <input id="company" name="type_address" type="radio" ng-checked="checkType===1">
                <label class="variant__size--value red" ng-click="getTypeAddress($event)" style="width: auto; padding: .25rem" for="company">Company</label>
              </fieldset>
            </div>
            <div class="col-12 mb-12">
              <div class="checkout__checkbox">
                <input class="checkout__checkbox--input" id="default" type="checkbox" ng-checked="status===0?false:true" ng-model="status">
                <span class="checkout__checkbox--checkmark"></span>
                <label class="checkout__checkbox--label" for="default">
                  Set default</label>
              </div>
            </div>
          </div>
          <div class="col-12 btn-group text-right">
            <button class="primary__btn minicart__button--link" style="background-color: #647589;" ng-click="closeModal()">Cancel</button>
            <button class="primary__btn minicart__button--link" ng-click="saveDeliveryAddress()">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal -->

  <!-- Scroll top bar -->
  <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"></path>
    </svg></button>

  <!-- All Script JS Plugins here  -->
  <!-- <script src="/assets/js/vendor/popper.js" defer="defer"></script> -->
  <!-- <script src="/assets/js/vendor/bootstrap.min.js" defer="defer"></script> -->
  <script src="/assets/js/plugins/jquery.min.js"></script>
  <script src="/assets/admin/vendors/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/swiper-bundle.min.js"></script>
  <script src="/assets/js/plugins/glightbox.min.js"></script>

  <!-- Customscript js -->
  <script src="/assets/js/script.js"></script>

  <!-- AngularJS -->
  <script src="/assets/js/plugins/angular.min.js"></script>
  <script src="/assets/js/plugins/dirPagination.js"></script>
  <script src="/assets/js/controllers/InitializationController.js"></script>
  <script src="/assets/vendor/ckeditor/ckeditor.js"></script>
  <script src="/assets/js/angular-ckeditor.js"></script>
  <script src="/assets/js/controllers/client/checkoutController.js"></script>



</body>
<editor-card style="position:absolute;top:0px;left:0px;z-index:auto;display: block !important">
  <div dir="ltr" style="all: initial;">
    <div style="color: initial; font: initial; font-feature-settings: initial; font-kerning: initial; font-optical-sizing: initial; font-palette: initial; font-synthesis: initial; font-variation-settings: initial; forced-color-adjust: initial; text-orientation: initial; text-rendering: initial; -webkit-font-smoothing: initial; -webkit-locale: initial; -webkit-text-orientation: initial; -webkit-writing-mode: initial; writing-mode: initial; zoom: initial; accent-color: initial; place-content: initial; place-items: initial; place-self: initial; alignment-baseline: initial; animation: initial; app-region: initial; appearance: initial; aspect-ratio: initial; backdrop-filter: initial; backface-visibility: initial; background: initial; background-blend-mode: initial; baseline-shift: initial; block-size: initial; border-block: initial; border: initial; border-radius: initial; border-collapse: initial; border-end-end-radius: initial; border-end-start-radius: initial; border-inline: initial; border-start-end-radius: initial; border-start-start-radius: initial; inset: initial; box-shadow: initial; box-sizing: initial; break-after: initial; break-before: initial; break-inside: initial; buffered-rendering: initial; caption-side: initial; caret-color: initial; clear: initial; clip: initial; clip-path: initial; clip-rule: initial; color-interpolation: initial; color-interpolation-filters: initial; color-rendering: initial; color-scheme: initial; columns: initial; column-fill: initial; gap: initial; column-rule: initial; column-span: initial; contain: initial; contain-intrinsic-block-size: initial; contain-intrinsic-size: initial; contain-intrinsic-inline-size: initial; content: initial; content-visibility: initial; counter-increment: initial; counter-reset: initial; counter-set: initial; cursor: initial; cx: initial; cy: initial; d: initial; display: initial; dominant-baseline: initial; empty-cells: initial; fill: initial; fill-opacity: initial; fill-rule: initial; filter: initial; flex: initial; flex-flow: initial; float: initial; flood-color: initial; flood-opacity: initial; grid: initial; grid-area: initial; height: initial; hyphens: initial; image-orientation: initial; image-rendering: initial; inline-size: initial; inset-block: initial; inset-inline: initial; isolation: initial; letter-spacing: initial; lighting-color: initial; line-break: initial; list-style: initial; margin-block: initial; margin: initial; margin-inline: initial; marker: initial; mask: initial; mask-type: initial; max-block-size: initial; max-height: initial; max-inline-size: initial; max-width: initial; min-block-size: initial; min-height: initial; min-inline-size: initial; min-width: initial; mix-blend-mode: initial; object-fit: initial; object-position: initial; offset: initial; opacity: initial; order: initial; origin-trial-test-property: initial; orphans: initial; outline: initial; outline-offset: initial; overflow-anchor: initial; overflow-clip-margin: initial; overflow-wrap: initial; overflow: initial; overscroll-behavior-block: initial; overscroll-behavior-inline: initial; overscroll-behavior: initial; padding-block: initial; padding: initial; padding-inline: initial; page: initial; page-orientation: initial; paint-order: initial; perspective: initial; perspective-origin: initial; pointer-events: initial; position: absolute; quotes: initial; r: initial; resize: initial; ruby-position: initial; rx: initial; ry: initial; scroll-behavior: initial; scroll-margin-block: initial; scroll-margin: initial; scroll-margin-inline: initial; scroll-padding-block: initial; scroll-padding: initial; scroll-padding-inline: initial; scroll-snap-align: initial; scroll-snap-stop: initial; scroll-snap-type: initial; scrollbar-gutter: initial; shape-image-threshold: initial; shape-margin: initial; shape-outside: initial; shape-rendering: initial; size: initial; speak: initial; stop-color: initial; stop-opacity: initial; stroke: initial; stroke-dasharray: initial; stroke-dashoffset: initial; stroke-linecap: initial; stroke-linejoin: initial; stroke-miterlimit: initial; stroke-opacity: initial; stroke-width: initial; tab-size: initial; table-layout: initial; text-align: initial; text-align-last: initial; text-anchor: initial; text-combine-upright: initial; text-decoration: initial; text-decoration-skip-ink: initial; text-emphasis: initial; text-emphasis-position: initial; text-indent: initial; text-overflow: initial; text-shadow: initial; text-size-adjust: initial; text-transform: initial; text-underline-offset: initial; text-underline-position: initial; touch-action: initial; transform: initial; transform-box: initial; transform-origin: initial; transform-style: initial; transition: initial; user-select: initial; vector-effect: initial; vertical-align: initial; visibility: initial; border-spacing: initial; -webkit-border-image: initial; -webkit-box-align: initial; -webkit-box-decoration-break: initial; -webkit-box-direction: initial; -webkit-box-flex: initial; -webkit-box-ordinal-group: initial; -webkit-box-orient: initial; -webkit-box-pack: initial; -webkit-box-reflect: initial; -webkit-highlight: initial; -webkit-hyphenate-character: initial; -webkit-line-break: initial; -webkit-line-clamp: initial; -webkit-mask-box-image: initial; -webkit-mask: initial; -webkit-mask-composite: initial; -webkit-perspective-origin-x: initial; -webkit-perspective-origin-y: initial; -webkit-print-color-adjust: initial; -webkit-rtl-ordering: initial; -webkit-ruby-position: initial; -webkit-tap-highlight-color: initial; -webkit-text-combine: initial; -webkit-text-decorations-in-effect: initial; -webkit-text-fill-color: initial; -webkit-text-security: initial; -webkit-text-stroke: initial; -webkit-transform-origin-x: initial; -webkit-transform-origin-y: initial; -webkit-transform-origin-z: initial; -webkit-user-drag: initial; -webkit-user-modify: initial; white-space: initial; widows: initial; width: initial; will-change: initial; word-break: initial; word-spacing: initial; x: initial; y: initial; z-index: 2147483647;">
      <link rel="stylesheet" href="chrome-extension://gpaiobkfhnonedkhhfjpmhdalgeoebfa/fonts/fabric-icons.css">
      <div style="all: initial;"></div>
    </div>
  </div>
</editor-card>

</html>