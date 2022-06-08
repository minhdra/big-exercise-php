@extends('_layout_client')
@section('content')
<main class="main__content_wrapper" ng-controller="trackingController">

  <!-- Start breadcrumb section -->
  <section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
      <div class="row row-cols-1">
        <div class="col">
          <div class="breadcrumb__content text-center">
            <h1 class="breadcrumb__content--title text-white mb-25">About Us</h1>
            <ul class="breadcrumb__content--menu d-flex justify-content-center">
              <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
              <li class="breadcrumb__content--menu__items"><span class="text-white">About Us</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End breadcrumb section -->

  <!-- Start about section -->
  <section class="about__section section--padding mb-95">
    <div class="container">
      <div class="header__search--box" style="margin: auto;">
        <label>
          <input class="newsletter__subscribe--input" placeholder="Enter id your order" type="text" spellcheck="false" data-ms-editor="true" ng-model="order_id">
        </label>
        <button class="header__search--button bg__secondary text-white" type="submit" aria-label="search button" ng-click="trackingOrder()">
          Tracking
        </button>
      </div>
      <main style="margin-top: 4rem" ng-if="order">
        <div>
          <div class="checkout__content--step section__shipping--address pt-0">
            <div class="order__confirmed--area border-radius-5 mb-15 d-flex justify-content-between">
              <h3 class="order__confirmed--title h4">Your order @{{order.status.status_name}}</h3>
              <button class="primary__btn minicart__button--link" ng-click="cancelOrder()" ng-if="order.status_id==1">Cancel</button>
            </div>
            <div class="customer__information--area border-radius-5">
              <h3 class="customer__information--title h4">Customer Information</h3>
              <div class="customer__information--inner d-flex">
                <div class="customer__information--list">
                  <div class="customer__information--step">
                    <h4 class="customer__information--subtitle h5">Contact information</h4>
                    <span class="customer__information--text">@{{order.delivery_address}}</span>
                  </div>
                  <div class="customer__information--step">
                    <h4 class="customer__information--subtitle h5">Shipping address</h4>
                    <ul>
                      <li ng-repeat="row in order.details"><span class="customer__information--text">@{{row.product.name}} $@{{row.single_price|number}} * @{{row.quantity}}</span>  <strong>$@{{row.single_price*row.quantity|number}}</strong></li>
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
                    <h4 class="customer__information--subtitle h5">Total</h4>
                    <strong>$@{{order.total|number}}</strong>
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
    </div>
  </section>
  <!-- End about section -->

  <!-- Start shipping section -->
  <section class="shipping__section2 shipping__style3 section--padding">
    <div class="container">
      <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="/assets/img/other/shipping1.png" alt="">
          </div>
          <div class="shipping__items2--content">
            <h2 class="shipping__items2--content__title h3">Shipping</h2>
            <p class="shipping__items2--content__desc">From handpicked sellers</p>
          </div>
        </div>
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="/assets/img/other/shipping2.png" alt="">
          </div>
          <div class="shipping__items2--content">
            <h2 class="shipping__items2--content__title h3">Payment</h2>
            <p class="shipping__items2--content__desc">From handpicked sellers</p>
          </div>
        </div>
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="/assets/img/other/shipping3.png" alt="">
          </div>
          <div class="shipping__items2--content">
            <h2 class="shipping__items2--content__title h3">Return</h2>
            <p class="shipping__items2--content__desc">From handpicked sellers</p>
          </div>
        </div>
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="/assets/img/other/shipping4.png" alt="">
          </div>
          <div class="shipping__items2--content">
            <h2 class="shipping__items2--content__title h3">Support</h2>
            <p class="shipping__items2--content__desc">From handpicked sellers</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End shipping section -->

  <!-- Start brand logo section -->
  <div class="brand__logo--section bg__secondary section--padding">
    <div class="container-fluid">
      <div class="row row-cols-1">
        <div class="col">
          <div class="brand__logo--section__inner d-flex justify-content-center align-items-center">
            <div class="brand__logo--items">
              <img class="brand__logo--items__thumbnail--img display-block" src="/assets/img/logo/brand-logo1.png" alt="brand logo">
            </div>
            <div class="brand__logo--items">
              <img class="brand__logo--items__thumbnail--img display-block" src="/assets/img/logo/brand-logo2.png" alt="brand logo">
            </div>
            <div class="brand__logo--items">
              <img class="brand__logo--items__thumbnail--img display-block" src="/assets/img/logo/brand-logo3.png" alt="brand logo">
            </div>
            <div class="brand__logo--items">
              <img class="brand__logo--items__thumbnail--img display-block" src="/assets/img/logo/brand-logo4.png" alt="brand logo">
            </div>
            <div class="brand__logo--items">
              <img class="brand__logo--items__thumbnail--img display-block" src="/assets/img/logo/brand-logo5.png" alt="brand logo">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End brand logo section -->
</main>
@stop

@section('js')
<script src="/assets/js/controllers/client/trackingController.js"></script>
@stop
