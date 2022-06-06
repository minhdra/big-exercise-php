@extends('_layout_client')
@section('content')
<main class="main__content_wrapper" ng-controller="profileController" ng-init="loadData()">

  <!-- Start breadcrumb section -->
  <section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
      <div class="row row-cols-1">
        <div class="col">
          <div class="breadcrumb__content text-center">
            <h1 class="breadcrumb__content--title text-white mb-25">My Account</h1>
            <ul class="breadcrumb__content--menu d-flex justify-content-center">
              <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('index')}}">Home</a></li>
              <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End breadcrumb section -->

  <!-- my account section start -->
  <section class="my__account--section section--padding">
    <div class="container-fluid">
      <p class="account__welcome--text">Hello, @{{customer.info ? customer.info.full_name : customer.username}} welcome to your dashboard!</p>
      <div class="my__account--section__inner border-radius-10 d-flex">
        <div class="account__left--sidebar">
          <h2 class="account__content--title h3 mb-20">My Profile</h2>
          <ul class="account__menu">
            <li class="account__menu--list @{{row.id === sidebarIndex ? 'active' : ''}}" ng-repeat="row in sidebarItems" ng-click="sidebarClick(row)"><a>@{{row.label}}</a></li>
          </ul>
        </div>
        <div class="account__wrapper">
          <div class="account__content" ng-if="sidebarIndex===0">
            <h2 class="account__content--title h3 mb-20">Orders History</h2>
            <div class="account__table--area">
              <table class="account__table" ng-if="customer.orders.length > 0">
                <thead class="account__table--header">
                  <tr class="account__table--header__child">
                    <th class="account__table--header__child--items">Order</th>
                    <th class="account__table--header__child--items">Date</th>
                    <th class="account__table--header__child--items">Delivery address</th>
                    <th class="account__table--header__child--items">Status</th>
                    <th class="account__table--header__child--items">Total</th>
                    <th class="account__table--header__child--items">Details</th>
                  </tr>
                </thead>
                <tbody class="account__table--body mobile__none">
                  <tr class="account__table--body__child" dir-paginate="row in customer.orders|itemsPerPage:itemsPerPage" currentPage="currentPage">
                    <td class="account__table--body__child--items">#@{{row.id}}</td>
                    <td class="account__table--body__child--items">@{{row.created_at | date}}</td>
                    <td class="account__table--body__child--items">@{{row.delivery_address}}</td>
                    <td class="account__table--body__child--items"><span class=" previous__link--content" style="margin:0">@{{row.status.status_name}}</span></td>
                    <td class="account__table--body__child--items">$@{{row.total|number}}</td>
                    <td class="account__table--body__child--items">
                      <button class="primary__btn minicart__button--link" ng-click="openOrderDetail($index)">View</button>
                    </td>
                  </tr>
                </tbody>
                <tbody class="account__table--body mobile__block">
                  <tr class="account__table--body__child" dir-paginate="row in customer.orders|itemsPerPage:itemsPerPage" currentPage="currentPage">
                    <td class="account__table--body__child--items">
                      <strong>Order</strong>
                      <span>#@{{row.id}}</span>
                    </td>
                    <td class="account__table--body__child--items">
                      <strong>Date</strong>
                      <span>@{{row.created_at | date}}</span>
                    </td>
                    <td class="account__table--body__child--items">
                      <strong>Delivery address</strong>
                      <span>@{{row.delivery_address}}</span>
                    </td>
                    <td class="account__table--body__child--items">
                      <strong>Status</strong>
                      <span class=" previous__link--content" style="margin:0">@{{row.status.status_name}}</span>
                    </td>
                    <td class="account__table--body__child--items">
                      <strong>Total</strong>
                      <span>$@{{row.total|number}}</span>
                    </td>
                    <td class="account__table--body__child--items">
                      <strong>Details</strong>
                      <button class="primary__btn minicart__button--link" ng-click="openOrderDetail($index)">View</button>
                    </td>
                  </tr>
                </tbody>
                <dir-pagination-controls direction-links="true" boundary-links="true" on-page-change='indexCount(newPageNumber)'>
                </dir-pagination-controls>
              </table>
              <div class="d-flex w-100" ng-if="customer.orders.length < 0">
                <h3>You haven't any orders, <a class="previous__link--content" href="/shop">Shopping now</a></h3>
              </div>
            </div>
          </div>
          <div class="account__content" ng-if="sidebarIndex===1">
            <h3 class="account__content--title mb-20">Addresses</h3>
            <button class="new__address--btn primary__btn mb-25" type="button" ng-click="showUpdateDeliveryAddress()">Add a new address</button>
            <div class="d-flex flex-wrap">
              <div style="margin-right: 32px" class="mb-20" ng-repeat="row in customer.delivery_addresses">
                <div class="account__details two">
                  <h4 class="account__details--title">@{{row.status===1?'Default':'Other'}}</h4>
                  <p class="account__details--desc">@{{row.full_name}}, @{{row.phone_number}} <br> @{{row.specific_address}} <br> @{{row.commune}} <br> @{{row.district}} <br> @{{row.province}}<br> @{{row.type_address}}</p>
                </div>
                <div class="account__details--footer d-flex">
                  <button class="account__details--footer__btn" type="button" ng-click="showUpdateDeliveryAddress(row)">Edit</button>
                  <button class="account__details--footer__btn" type="button" ng-click="removeDeliveryAddress(row.id)">Delete</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- my account section end -->

  <!-- Start shipping section -->
  <section class="shipping__section2 shipping__style3 section--padding pt-0">
    <div class="container">
      <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="assets/img/other/shipping1.png" alt="">
          </div>
          <div class="shipping__items2--content">
            <h2 class="shipping__items2--content__title h3">Shipping</h2>
            <p class="shipping__items2--content__desc">From handpicked sellers</p>
          </div>
        </div>
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="assets/img/other/shipping2.png" alt="">
          </div>
          <div class="shipping__items2--content">
            <h2 class="shipping__items2--content__title h3">Payment</h2>
            <p class="shipping__items2--content__desc">From handpicked sellers</p>
          </div>
        </div>
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="assets/img/other/shipping3.png" alt="">
          </div>
          <div class="shipping__items2--content">
            <h2 class="shipping__items2--content__title h3">Return</h2>
            <p class="shipping__items2--content__desc">From handpicked sellers</p>
          </div>
        </div>
        <div class="shipping__items2 d-flex align-items-center">
          <div class="shipping__items2--icon">
            <img src="assets/img/other/shipping4.png" alt="">
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

  <!-- Start modal -->
  <div class="modal" id="detailsModal" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper" style="min-width: 500px; min-height: 250px; overflow: auto;">
      <header class="modal-header quickview__header">
        <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
      </header>
      <div class="quickview__inner">
        <h3 class="mb-20 h3">Order details</h3>
        <div class="account__table--area">
          <table class="account__table" ng-if="customer.orders[orderIndex].details.length > 0">
            <thead class="account__table--header">
              <tr class="account__table--header__child">
                <th class="account__table--header__child--items">Serial</th>
                <th class="account__table--header__child--items">Image</th>
                <th class="account__table--header__child--items">Product</th>
                <th class="account__table--header__child--items">Color</th>
                <th class="account__table--header__child--items">Size</th>
                <th class="account__table--header__child--items">Quantity</th>
                <th class="account__table--header__child--items">Unit price</th>
              </tr>
            </thead>
            <tbody class="account__table--body mobile__none">
              <tr class="account__table--body__child" ng-repeat="row in customer.orders[orderIndex].details">
                <td class="account__table--body__child--items">@{{$index+1}}</td>
                <td class="account__table--body__child--items">
                  <img ng-src="/assets/img/products/@{{row.image}}" width="100px" alt="product-img">
                </td>
                <td class="account__table--body__child--items">@{{row.product.name}}</td>
                <td class="account__table--body__child--items">@{{row.color}}</td>
                <td class="account__table--body__child--items">@{{row.size}}</td>
                <td class="account__table--body__child--items">@{{row.quantity}}</td>
                <td class="account__table--body__child--items">$@{{row.single_price*row.quantity|number}}</td>
              </tr>
            </tbody>
            <tbody class="account__table--body mobile__block">
              <tr class="account__table--body__child" ng-repeat="row in customer.orders[orderIndex].details">
                <td class="account__table--body__child--items">
                  <strong>Serial</strong>
                  <span>@{{$index+1}}</span>
                </td>
                <td class="account__table--body__child--items">
                  <strong>Image</strong>
                  <img ng-src="/assets/img/products/@{{row.image}}" width="100px" alt="product-img">
                </td>
                <td class="account__table--body__child--items">
                  <strong>Product</strong>
                  <span>@{{row.product.name}}</span>
                </td>
                <td class="account__table--body__child--items">
                  <strong>Color</strong>
                  <span>@{{row.color}}</span>
                </td>
                <td class="account__table--body__child--items">
                  <strong>Size</strong>
                  <span>@{{row.size}}</span>
                </td>
                <td class="account__table--body__child--items">
                  <strong>Quantity</strong>
                  <span>@{{row.quantity}}</span>
                </td>
                <td class="account__table--body__child--items">
                  <strong>Total</strong>
                  <span>$@{{row.single_price*row.quantity|number}}</span>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="d-flex w-100" ng-if="customer.orders[orderIndex].details.length < 0">
            <h3>You haven't any orders, <a class="previous__link--content" href="/shop">Shopping now</a></h3>
          </div>
        </div>
        <div class="col-12 btn-group text-right">
          <button class="primary__btn minicart__button--link close-modal" style="background-color: #647589; margin-top: 2rem;" aria-label="close modal" data-close ng-click="closeModal()">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal -->
</main>
@stop
@section('js')
<script src="/assets/js/controllers/client/profileController.js"></script>
@stop