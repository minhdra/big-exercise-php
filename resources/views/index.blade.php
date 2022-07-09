@extends('_layout_client')
@section('content')
<main class="main__content_wrapper" ng-app="app" ng-controller="homeController" ng-init="loadClientHome()">
  <!-- Start slider section -->
  <section class="hero__slider--section">
    <div class="hero__slider--inner hero__slider--activation swiper">
      <div class="hero__slider--wrapper swiper-wrapper">
        <div class="swiper-slide" ng-repeat="row in sliders">
          <div class="hero__slider--items" ng-style="{'background': 'url(/assets/slider/@{{row.image}})', 'background-repeat': 'no-repeat', 'background-attachment': 'scroll', 'background-position': 'center center', 'background-size': 'cover'}">
            <div class="container-fluid">
              <div class="hero__slider--items__inner">
                <div class="row row-cols-1">
                  <div class="col">
                    <div class="slider__content">
                      <p class="slider__content--desc desc1 mb-15"><img class="slider__text--shape__icon" src="/assets/img/icon/text-shape-icon.png" alt="text-shape-icon"> New Collection</p>
                      <h2 class="slider__content--maintitle h1">@{{row.title}}<br>
                        @{{row.collection}}</h2>
                      <p class="slider__content--desc desc2 d-sm-2-none mb-40">@{{row.content}}</p>
                      <a class="slider__btn primary__btn" href="@{{row.link}}">Show Collection
                        <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                          <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper__nav--btn swiper-button-next"></div>
      <div class="swiper__nav--btn swiper-button-prev"></div>
    </div>
  </section>
  <!-- End slider section -->

  <!-- Start banner section -->
  <section class="banner__section section--padding">
    <div class="container-fluid">
      <div class="row mb--n28">
        <div class="col-lg-5 col-md-order mb-28">
          <div class="banner__items">
            <a class="banner__items--thumbnail position__relative" href="{{route('shop')}}"><img class="banner__items--thumbnail__img" src="/assets/img/banner/banner1.png" alt="banner-img">
              <div class="banner__items--content">
                <span class="banner__items--content__subtitle">17% Discount</span>
                <h2 class="banner__items--content__title h3">Spring Collection <br>
                  Style To</h2>
                <span class="banner__items--content__link">View Discounts
                  <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                    <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                  </svg>
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-7 mb-28">
          <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-1">
            <div class="col mb-28">
              <div class="banner__items">
                <a class="banner__items--thumbnail position__relative" href="{{route('shop')}}"><img class="banner__items--thumbnail__img" src="/assets/img/banner/banner2.png" alt="banner-img">
                  <div class="banner__items--content">
                    <span class="banner__items--content__subtitle text__secondary">Shop Women</span>
                    <h2 class="banner__items--content__title h3">Up to 70% Off & <br>
                      Free Shipping</h2>
                    <span class="banner__items--content__link">View Discounts
                      <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                        <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col mb-28">
              <div class="banner__items">
                <a class="banner__items--thumbnail position__relative" href="{{route('shop')}}"><img class="banner__items--thumbnail__img" src="/assets/img/banner/banner3.png" alt="banner-img">
                  <div class="banner__items--content">
                    <span class="banner__items--content__subtitle">Shop Women</span>
                    <h2 class="banner__items--content__title h3">Free Shipping Over <br>
                      Order $120</h2>
                    <span class="banner__items--content__link">View Discounts
                      <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                        <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="banner__items">
            <a class="banner__items--thumbnail position__relative" href="{{route('shop')}}"><img class="banner__items--thumbnail__img banner__img--max__height" src="/assets/img/banner/banner4.png" alt="banner-img">
              <div class="banner__items--content">
                <span class="banner__items--content__subtitle">25% Discount</span>
                <h2 class="banner__items--content__title h3">Leather Saddle <br>
                  Bag Style</h2>
                <span class="banner__items--content__link">View Discounts
                  <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                    <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                  </svg>
                </span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End banner section -->

  <!-- Newest products -->
  <!-- Start product section -->
  <section class="product__section section--padding pt-0">
    <div class="container-fluid">
      <div class="section__heading text-center mb-35">
        <h2 class="section__heading--maintitle">Newest Products</h2>
      </div>
      <div class="tab_content">
        <div id="featured" class="tab_pane active show">
          <div class="product__section--inner">
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
              <div class="col mb-30" ng-repeat="row in dataNew">
                <div class="product__items ">
                  <div class="product__items--thumbnail">
                    <a class="product__items--link" href="/shop/@{{row.id}}">
                      <img class="product__items--img product__primary--img" ng-src="/assets/img/products/@{{row.colors[0].images[0].image}}" alt="product-img">
                      <img class="product__items--img product__secondary--img" ng-src="/assets/img/products/@{{row.colors[0].images[1].image}}" alt="product-img">
                    </a>
                    <div class="product__badge">
                      <span class="product__badge--items sale">Sale</span>
                    </div>
                  </div>
                  <div class="product__items--content">
                    <span class="product__items--content__subtitle">@{{row.category.name}}</span>
                    <h3 class="product__items--content__title h4"><a href="/shop/@{{row.id}}" style="height: 52px;">@{{row.name}}</a></h3>
                    <div class="product__items--price">
                      <span class="current__price">$@{{row.price.price_current == 0 ? row.price.price_origin : row.price.price_current}}</span>
                      <span class="@{{row.price.price_current == 0 ? '' : 'price__divided'}} "></span>
                      <span class="old__price">@{{row.price.price_current == 0 ? '' : '$' + row.price.price_origin}}</span>
                    </div>
                    <ul class="rating product__rating d-flex">
                      <li class="rating__list">
                        <span class="rating__list--icon">
                          <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                          </svg>
                        </span>
                      </li>
                      <li class="rating__list">
                        <span class="rating__list--icon">
                          <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                          </svg>
                        </span>
                      </li>
                      <li class="rating__list">
                        <span class="rating__list--icon">
                          <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                          </svg>
                        </span>
                      </li>
                      <li class="rating__list">
                        <span class="rating__list--icon">
                          <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                          </svg>
                        </span>
                      </li>
                      <li class="rating__list">
                        <span class="rating__list--icon">
                          <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                          </svg>
                        </span>
                      </li>

                    </ul>
                    <ul class="product__items--action d-flex">
                      <li class="product__items--action__list">
                        <a class="product__items--action__btn add__to--cart" href="/shop/@{{row.id}}">
                          <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                            <g transform="translate(0 0)">
                              <g>
                                <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                              </g>
                            </g>
                          </svg>
                          <span class="add__to--cart__text"> + Add to cart</span>
                        </a>
                      </li>
                      <li class="product__items--action__list">
                        <a class="product__items--action__btn" href="/wishlist">
                          <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512">
                            <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                          </svg>
                          <span class="visually-hidden">Wishlist</span>
                        </a>
                      </li>
                      <li class="product__items--action__list" ng-click="showQuickView(row.id)">
                        <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                          <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512">
                            <path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                          </svg>
                          <span class="visually-hidden">Quick View</span>
                        </a>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End product section -->

  <!-- Start deals banner section -->
  <section class="deals__banner--section section--padding pt-0">
    <div class="container-fluid">
      <div class="deals__banner--inner banner__bg">
        <div class="row row-cols-1 align-items-center">
          <div class="col">
            <div class="deals__banner--content position__relative">
              <span class="deals__banner--content__subtitle text__secondary">Hurry up and Get 25% Discount</span>
              <h2 class="deals__banner--content__maintitle">Deals Of The Day</h2>
              <p class="deals__banner--content__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br> sed do eiusmod tempor incididunt ut labore </p>
              <div class="deals__banner--countdown d-flex" data-countdown="Sep 30, 2022 00:00:00"></div>
              <a class="primary__btn" href="{{route('shop')}}">Show Collection
                <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                  <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                </svg>
              </a>
              <br>
              <div class="banner__bideo--play">
                <a class="banner__bideo--play__icon glightbox" href="https://vimeo.com/115041822" data-gallery="video">
                  <svg id="play" xmlns="http://www.w3.org/2000/svg" width="40.302" height="40.302" viewBox="0 0 46.302 46.302">
                    <g id="Group_193" data-name="Group 193" transform="translate(0 0)">
                      <path id="Path_116" data-name="Path 116" d="M39.521,6.781a23.151,23.151,0,0,0-32.74,32.74,23.151,23.151,0,0,0,32.74-32.74ZM23.151,44.457A21.306,21.306,0,1,1,44.457,23.151,21.33,21.33,0,0,1,23.151,44.457Z" fill="currentColor" />
                      <g id="Group_188" data-name="Group 188" transform="translate(15.588 11.19)">
                        <g id="Group_187" data-name="Group 187">
                          <path id="Path_117" data-name="Path 117" d="M190.3,133.213l-13.256-8.964a3,3,0,0,0-4.674,2.482v17.929a2.994,2.994,0,0,0,4.674,2.481l13.256-8.964a3,3,0,0,0,0-4.963Zm-1.033,3.435-13.256,8.964a1.151,1.151,0,0,1-1.8-.953V126.73a1.134,1.134,0,0,1,.611-1.017,1.134,1.134,0,0,1,1.185.063l13.256,8.964a1.151,1.151,0,0,1,0,1.907Z" transform="translate(-172.366 -123.734)" fill="currentColor" />
                        </g>
                      </g>
                      <g id="Group_190" data-name="Group 190" transform="translate(28.593 5.401)">
                        <g id="Group_189" data-name="Group 189">
                          <path id="Path_118" data-name="Path 118" d="M328.31,70.492a18.965,18.965,0,0,0-10.886-10.708.922.922,0,1,0-.653,1.725,17.117,17.117,0,0,1,9.825,9.664.922.922,0,1,0,1.714-.682Z" transform="translate(-316.174 -59.724)" fill="currentColor" />
                        </g>
                      </g>
                      <g id="Group_192" data-name="Group 192" transform="translate(22.228 4.243)">
                        <g id="Group_191" data-name="Group 191">
                          <path id="Path_119" data-name="Path 119" d="M249.922,47.187a19.08,19.08,0,0,0-3.2-.27.922.922,0,0,0,0,1.845,17.245,17.245,0,0,1,2.889.243.922.922,0,1,0,.31-1.818Z" transform="translate(-245.801 -46.917)" fill="currentColor" />
                        </g>
                      </g>
                    </g>
                  </svg>
                  <span class="visually-hidden">Video Play</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End deals banner section -->

  <!-- Best seller products -->
  <!-- Start product section -->
  <section class="product__section section--padding pt-0" ng-if="dataSeller.length > 0">
    <div class="container-fluid">
      <div class="section__heading text-center mb-50">
        <h2 class="section__heading--maintitle">Our Best Seller</h2>
      </div>
      <div class="product__section--inner product__swiper--activation swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide" ng-repeat="row in dataSeller">
            <div class="product__items ">
              <div class="product__items--thumbnail">
                <a class="product__items--link" href="/shop/@{{row.id}}">
                  <img class="product__items--img product__primary--img" ng-src="/assets/img/products/@{{row.colors[0].images[0].image}}" alt="product-img">
                  <img class="product__items--img product__secondary--img" ng-src="/assets/img/products/@{{row.colors[0].images[1].image}}" alt="product-img">
                </a>
                <div class="product__badge">
                  <span class="product__badge--items sale">Sale</span>
                </div>
              </div>
              <div class="product__items--content">
                <span class="product__items--content__subtitle">@{{row.category.name}}</span>
                <h3 class="product__items--content__title h4"><a href="/shop/@{{row.id}}" style="height: 52px;">@{{row.name}}</a></h3>
                <div class="product__items--price">
                  <span class="current__price">$@{{row.price.price_current == 0 ? row.price.price_origin : row.price.price_current}}</span>
                  <span class="@{{row.price.price_current == 0 ? '' : 'price__divided'}} "></span>
                  <span class="old__price">@{{row.price.price_current == 0 ? '' : '$' + row.price.price_origin}}</span>
                </div>
                <ul class="rating product__rating d-flex">
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>

                </ul>
                <ul class="product__items--action d-flex">
                  <li class="product__items--action__list">
                    <a class="product__items--action__btn add__to--cart" href="/shop/@{{row.id}}">
                      <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                        <g transform="translate(0 0)">
                          <g>
                            <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                            <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                            <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                          </g>
                        </g>
                      </svg>
                      <span class="add__to--cart__text"> + Add to cart</span>
                    </a>
                  </li>
                  <li class="product__items--action__list">
                    <a class="product__items--action__btn" href="/wishlist">
                      <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512">
                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                      </svg>
                      <span class="visually-hidden">Wishlist</span>
                    </a>
                  </li>
                  <li class="product__items--action__list" ng-click="showQuickView(row.id)">
                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                      <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512">
                        <path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                        <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                      </svg>
                      <span class="visually-hidden">Quick View</span>
                    </a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper__nav--btn swiper-button-next"></div>
        <div class="swiper__nav--btn swiper-button-prev"></div>
      </div>
    </div>
  </section>
  <!-- End product section -->

  <!-- Start banner section -->
  <section class="banner__section section--padding pt-0">
    <div class="container-fluid">
      <div class="row row-cols-md-2 row-cols-1 mb--n28">
        <div class="col mb-28">
          <div class="banner__items position__relative">
            <a class="banner__items--thumbnail " href="{{route('shop')}}"><img class="banner__items--thumbnail__img banner__img--max__height" src="/assets/img/banner/banner5.png" alt="banner-img">
              <div class="banner__items--content">
                <span class="banner__items--content__subtitle d-none d-lg-block">Pick Your Items</span>
                <h2 class="banner__items--content__title h3">Up to 25% Off Order Now</h2>
                <span class="banner__items--content__link"><u>Shop now</u></span>
              </div>
            </a>
          </div>
        </div>
        <div class="col mb-28">
          <div class="banner__items position__relative">
            <a class="banner__items--thumbnail " href="{{route('shop')}}"><img class="banner__items--thumbnail__img banner__img--max__height" src="/assets/img/banner/banner6.png" alt="banner-img">
              <div class="banner__items--content">
                <span class="banner__items--content__subtitle d-none d-lg-block">Special offer</span>
                <h2 class="banner__items--content__title h3">Up to 35% Off Order Now</h2>
                <span class="banner__items--content__link"><u>Discover Now</u> </span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End banner section -->

  <!-- Start testimonial section -->
  <section class="testimonial__section section--padding pt-0">
    <div class="container-fluid">
      <div class="section__heading text-center mb-40">
        <h2 class="section__heading--maintitle">Our Clients Say</h2>
      </div>
      <div class="testimonial__section--inner testimonial__swiper--activation swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="testimonial__items text-center">
              <div class="testimonial__items--thumbnail">
                <img class="testimonial__items--thumbnail__img border-radius-50" src="/assets/img/other/testimonial-thumb1.png" alt="testimonial-img">
              </div>
              <div class="testimonial__items--content">
                <h3 class="testimonial__items--title">Nike Mardson</h3>
                <span class="testimonial__items--subtitle">fashion</span>
                <p class="testimonial__items--desc">Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                <ul class="rating testimonial__rating d-flex justify-content-center">
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="testimonial__items text-center">
              <div class="testimonial__items--thumbnail">
                <img class="testimonial__items--thumbnail__img border-radius-50" src="/assets/img/other/testimonial-thumb2.png" alt="testimonial-img">
              </div>
              <div class="testimonial__items--content">
                <h3 class="testimonial__items--title">Laura Johnson</h3>
                <span class="testimonial__items--subtitle">fashion</span>
                <p class="testimonial__items--desc">Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                <ul class="rating testimonial__rating d-flex justify-content-center">
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="testimonial__items text-center">
              <div class="testimonial__items--thumbnail">
                <img class="testimonial__items--thumbnail__img border-radius-50" src="/assets/img/other/testimonial-thumb3.png" alt="testimonial-img">
              </div>
              <div class="testimonial__items--content">
                <h3 class="testimonial__items--title">Richard Smith</h3>
                <span class="testimonial__items--subtitle">fashion</span>
                <p class="testimonial__items--desc">Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                <ul class="rating testimonial__rating d-flex justify-content-center">
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="testimonial__items text-center">
              <div class="testimonial__items--thumbnail">
                <img class="testimonial__items--thumbnail__img border-radius-50" src="/assets/img/other/testimonial-thumb1.png" alt="testimonial-img">
              </div>
              <div class="testimonial__items--content">
                <h3 class="testimonial__items--title">Nike Mardson</h3>
                <span class="testimonial__items--subtitle">fashion</span>
                <p class="testimonial__items--desc">Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                <ul class="rating testimonial__rating d-flex justify-content-center">
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>
                  <li class="rating__list">
                    <span class="rating__list--icon">
                      <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                      </svg>
                    </span>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="testimonial__pagination swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- End testimonial section -->

  <!-- Start banner section -->
  <section class="banner__section section--padding pt-0">
    <div class="container-fluid">
      <div class="row row-cols-1">
        <div class="col">
          <div class="banner__section--inner position__relative">
            <a class="banner__items--thumbnail display-block" href="{{route('shop')}}"><img class="banner__items--thumbnail__img banner__img--height__md display-block" src="/assets/img/banner/banner-bg2.png" alt="banner-img">
              <div class="banner__content--style2">
                <h2 class="banner__content--style2__title text-white">Need Winter Boots? </h2>
                <p class="banner__content--style2__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exercitation </p>
                <span class="primary__btn">Shop Now
                  <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                    <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                  </svg>
                </span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End banner section -->

  <!-- Start blog section -->
  <section class="blog__section section--padding pt-0">
    <div class="container-fluid">
      <div class="section__heading text-center mb-40">
        <h2 class="section__heading--maintitle">From The Blog</h2>
      </div>
      <div class="blog__section--inner blog__swiper--activation swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="blog__items">
              <div class="blog__thumbnail">
                <a class="blog__thumbnail--link" href="blog-details.html"><img class="blog__thumbnail--img" src="/assets/img/blog/blog1.png" alt="blog-img"></a>
              </div>
              <div class="blog__content">
                <span class="blog__content--meta">February 03, 2022</span>
                <h3 class="blog__content--title"><a href="blog-details.html">Fashion Trends In 2021 Styles,
                    Colors, Accessories</a></h3>
                <a class="blog__content--btn primary__btn" href="blog-details.html">Read more </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog__items">
              <div class="blog__thumbnail">
                <a class="blog__thumbnail--link" href="blog-details.html"><img class="blog__thumbnail--img" src="/assets/img/blog/blog2.png" alt="blog-img"></a>
              </div>
              <div class="blog__content">
                <span class="blog__content--meta">February 03, 2022</span>
                <h3 class="blog__content--title"><a href="blog-details.html">Meet the Woman Behind Cool
                    Ethical Label Refor </a></h3>
                <a class="blog__content--btn primary__btn" href="blog-details.html">Read more </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog__items">
              <div class="blog__thumbnail">
                <a class="blog__thumbnail--link" href="blog-details.html"><img class="blog__thumbnail--img" src="/assets/img/blog/blog3.png" alt="blog-img"></a>
              </div>
              <div class="blog__content">
                <span class="blog__content--meta">February 03, 2022</span>
                <h3 class="blog__content--title"><a href="blog-details.html">Lauryn Hill Could Make Tulle
                    Skirt and Cowboy</a></h3>
                <a class="blog__content--btn primary__btn" href="blog-details.html">Read more </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog__items">
              <div class="blog__thumbnail">
                <a class="blog__thumbnail--link" href="blog-details.html"><img class="blog__thumbnail--img" src="/assets/img/blog/blog4.png" alt="blog-img"></a>
              </div>
              <div class="blog__content">
                <span class="blog__content--meta">February 03, 2022</span>
                <h3 class="blog__content--title"><a href="blog-details.html">Fashion Trends In 2021 Styles,
                    Colors, Accessories</a></h3>
                <a class="blog__content--btn primary__btn" href="blog-details.html">Read more </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog__items">
              <div class="blog__thumbnail">
                <a class="blog__thumbnail--link" href="blog-details.html"><img class="blog__thumbnail--img" src="/assets/img/blog/blog2.png" alt="blog-img"></a>
              </div>
              <div class="blog__content">
                <span class="blog__content--meta">February 03, 2022</span>
                <h3 class="blog__content--title"><a href="blog-details.html">Lauryn Hill Could Make Tulle
                    Skirt and Cowboy</a></h3>
                <a class="blog__content--btn primary__btn" href="blog-details.html">Read more </a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper__nav--btn swiper-button-next"></div>
        <div class="swiper__nav--btn swiper-button-prev"></div>
      </div>
    </div>
  </section>
  <!-- End blog section -->

  <div class="modal" id="modal1" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper">
      <header class="modal-header quickview__header">
        <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
      </header>
      <div class="quickview__inner">
        <div class="row row-cols-lg-2 row-cols-md-2">
          <div class="col">
            <div class="quickview__product--media product__details--media">
              <div class="product__media--preview  swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" ng-repeat="row in item.colors[colorIndex].images">
                    <div class="product__media--preview__items">
                      <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="#"><img class="product__media--preview__items--img" ng-src="/assets/img/products/@{{row.image}}" alt="product-media-img"></a>
                      <div class="product__media--view__icon">
                        <a class="product__media--view__icon--link glightbox" href="#" data-gallery="product-media-preview" target="_blank">
                          <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product__media--nav swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" ng-repeat="row in item.colors[colorIndex].images">
                    <div class="product__media--nav__items">
                      <img class="product__media--nav__items--img" ng-src="/assets/img/products/@{{row.image}}" alt="product-nav-img">
                    </div>
                  </div>
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="quickview__info">
              <div>
                <h2 class="product__details--info__title mb-15">@{{item.name}}</h2>
                <div class="product__details--info__price mb-10">
                  <span class="current__price">$@{{item.price.price_current == 0 ? item.price.price_origin : item.price.price_current}}</span>
                  <span class="old__price">@{{item.price.price_current == 0 ? '' : '$' + item.price.price_origin}}</span>
                </div>
                <div class="quickview__info--ratting d-flex align-items-center mb-10">
                  <ul class="rating d-flex justify-content-center">
                    <li class="rating__list">
                      <span class="rating__list--icon">
                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                          <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                        </svg>
                      </span>
                    </li>
                    <li class="rating__list">
                      <span class="rating__list--icon">
                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                          <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                        </svg>
                      </span>
                    </li>
                    <li class="rating__list">
                      <span class="rating__list--icon">
                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                          <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                        </svg>
                      </span>
                    </li>
                    <li class="rating__list">
                      <span class="rating__list--icon">
                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                          <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                        </svg>
                      </span>
                    </li>
                    <li class="rating__list">
                      <span class="rating__list--icon">
                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                          <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                        </svg>
                      </span>
                    </li>

                  </ul>
                  <span class="quickview__info--review__text">(5 reviews)</span>
                </div>
                <p class="product__details--info__desc mb-15" id="des-single"></p>
                <div class="product__variant">
                  <div class="product__variant--list mb-10">
                    <fieldset class="variant__input--fieldset">
                      <legend class="product__variant--title mb-8">Color :</legend>
                      <div class="d-flex">
                        <div style="margin-right: .8rem;" ng-repeat="row in item.colors">
                          <input id="color-@{{$index}}" name="colorGroup" type="radio" ng-click="pickColor($index)" ng-checked="colorIndex===$index">
                          <label class="variant__color--value red" for="color-@{{$index}}" title="@{{row.color}}"><img class="variant__color--value__img" ng-src="/assets/img/products/@{{row.images[0].image}}" alt="variant-color-img"></label>
                        </div>

                      </div>
                    </fieldset>
                  </div>
                  <div class="product__variant--list mb-15">
                    <legend class="product__variant--title mb-8">Sizes :</legend>
                    <fieldset class="variant__input--fieldset weight d-flex">
                      <div style="margin-right: .25rem;" ng-repeat="row in item.colors[colorIndex].sizes">
                        <input id="@{{row.size}}" name="weight" type="radio" ng-checked="@{{sizeIndex==$index}}" ng-click="pickSize($index)">
                        <label class="variant__size--value red" for="@{{row.size}}">@{{row.size}}</label>
                      </div>
                    </fieldset>
                  </div>
                  <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                    <div class="quantity__box">
                      <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value" ng-click="changedCount(1)">-</button>
                      <label>
                        <input type="number" class="quantity__number quickview__value--number" ng-model="quantity" data-counter />
                      </label>
                      <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value" ng-click="changedCount(0)">+</button>
                    </div>
                    <button class="primary__btn quickview__cart--btn" ng-click="addCart()">Add To Cart</button>
                  </div>
                  <div class="quickview__variant--list variant__wishlist mb-15">
                    <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist">
                      <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                      </svg>
                      Add to Wishlist
                    </a>
                  </div>
                </div>
                <div class="quickview__social d-flex align-items-center">
                  <label class="quickview__social--title">Social Share:</label>
                  <ul class="quickview__social--wrapper mt-0 d-flex">
                    <li class="quickview__social--list">
                      <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                          <path data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor" />
                        </svg>
                        <span class="visually-hidden">Facebook</span>
                      </a>
                    </li>
                    <li class="quickview__social--list">
                      <a class="quickview__social--icon" target="_blank" href="https://twitter.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                          <path data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor" />
                        </svg>
                        <span class="visually-hidden">Twitter</span>
                      </a>
                    </li>
                    <li class="quickview__social--list">
                      <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                          <path data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor" />
                        </svg>
                        <span class="visually-hidden">Instagram</span>
                      </a>
                    </li>
                    <li class="quickview__social--list">
                      <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                          <path data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor" />
                        </svg>
                        <span class="visually-hidden">Youtube</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@stop

@section('js')
<script src="/assets/js/controllers/client/homeController.js"></script>
@stop