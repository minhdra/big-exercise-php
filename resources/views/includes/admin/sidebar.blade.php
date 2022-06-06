<div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
  <div class="sidebar-header">
    <div class="logo clearfix"><a href="/admin" class="logo-text float-left">
        <div class="logo-img"><img src="/assets/img/logo/icon-admin.png" alt="Convex Logo" /></div><span class="text align-middle" style="color: #ee2761">DRA</span>
      </a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
  </div>
  <div class="sidebar-content">
    <div class="nav-container">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li ng-class="getClass('/admin')"><a href="/admin" class="menu-item"><i class="icon-home"></i>Home</a>
        <li class="has-sub nav-item"><a href="#"><i class="icon-screen-desktop"></i><span data-i18n="" class="menu-title">Products</span></a>
          <ul class="menu-content">
            <li ng-class="getClass('/categories')"><a href="/admin/categories" class="menu-item">Categories</a>
            <li ng-class="getClass('/products')"><a href="/admin/products" class="menu-item">Products</a>
            </li>

            <li ng-class="getClass('/discounts')"><a href="/admin/discounts" class="menu-item">Discounts</a>
            </li>
          </ul>
        </li>
        <li class="has-sub nav-item"><a href="#"><i class="icon-users"></i><span data-i18n="" class="menu-title">Users</span></a>
          <ul class="menu-content">
            <li ng-class="getClass('/customers')"><a href="/admin/customers" class="menu-item">Customers manager</a>
            <li ng-class="getClass('/admins')"><a href="/admin/admins" class="menu-item">Admins manager</a>
            </li>
          </ul>
        </li>
        <li class="has-sub nav-item"><a href="#"><i class="icon-wallet"></i><span data-i18n="" class="menu-title">Shop</span></a>
          <ul class="menu-content">
            <li ng-class="getClass('/carts')"><a href="/admin/carts" class="menu-item">Carts manager</a>
            <li ng-class="getClass('/orders')"><a href="/admin/orders" class="menu-item">Orders manager</a>
            <li ng-class="getClass('/order_statuses')"><a href="/admin/order_statuses" class="menu-item">Order statuses</a>
            <li ng-class="getClass('/order_details')"><a href="/admin/order_details" class="menu-item">Order details</a>
            <li ng-class="getClass('/delivery_addresses')"><a href="/admin/delivery_addresses" class="menu-item">Delivery addresses</a>
            <li ng-class="getClass('/import_bills')"><a href="/admin/import_bills" class="menu-item">Import bills</a>
            <li ng-class="getClass('/import_bill_details')"><a href="/admin/import_bill_details" class="menu-item">Import bills details</a>
            <li ng-class="getClass('/magazines')"><a href="/admin/magazines" class="menu-item">Magazines</a>
            </li>
          </ul>
        </li>
        <li class="has-sub nav-item"><a href="#"><i class="icon-briefcase"></i><span data-i18n="" class="menu-title">Partners of shop</span></a>
          <ul class="menu-content">
            <li ng-class="getClass('/brands')"><a href="/admin/brands" class="menu-item">Brands</a>
            <li ng-class="getClass('/suppliers')"><a href="/admin/suppliers" class="menu-item">Suppliers</a>
            </li>
          </ul>
        </li>
        <li class="has-sub nav-item"><a href="#"><i class="icon-magnet"></i><span data-i18n="" class="menu-title">Design</span></a>
          <ul class="menu-content">
            <li ng-class="getClass('/slides')"><a href="/admin/slides" class="menu-item">Slides</a>
          </ul>
        </li>
        <li class="has-sub nav-item"><a href="#"><i class="icon-book-open"></i><span data-i18n="" class="menu-title">Others</span></a>
          <ul class="menu-content">
            <li ng-class="getClass('/colors')"><a href="/admin/colors" class="menu-item">Colors</a>
            </li>
            <li ng-class="getClass('/sizes')"><a href="/admin/sizes" class="menu-item">Sizes</a>
            </li>
            <li ng-class="getClass('/images')"><a href="/admin/images" class="menu-item">Images</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div class="sidebar-background"></div>
</div>