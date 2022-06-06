@extends('_layout_admin')
@section('content')
<div class="main-panel" ng-controller="homeController">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <!--Statistics cards Starts-->
        <div class="row">
          <div class="col-xl-4 col-lg-6 col-md-6 col-12">
            <div class="card bg-white">
              <div class="card-body">
                <div class="card-block pt-2 pb-0">
                  <div class="media">
                    <div class="media-body white text-left">
                      <h4 class="font-medium-5 card-title mb-0">@{{countUsers}}</h4>
                      <span class="grey darken-1">Total Customers</span>
                    </div>
                    <div class="media-right text-right">
                      <i class="icon-cup font-large-1 primary"></i>
                    </div>
                  </div>
                </div>
                <div id="Widget-line-chart" class="height-150 lineChartWidget WidgetlineChart mb-2">
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-12">
            <div class="card bg-white">
              <div class="card-body">
                <div class="card-block pt-2 pb-0">
                  <div class="media">
                    <div class="media-body white text-left">
                      <h4 class="font-medium-5 card-title mb-0">@{{countProducts}}</h4>
                      <span class="grey darken-1">Total Products</span>
                    </div>
                    <div class="media-right text-right">
                      <i class="icon-wallet font-large-1 warning"></i>
                    </div>
                  </div>
                </div>
                <div id="Widget-line-chart1" class="height-150 lineChartWidget WidgetlineChart1 mb-2">
                </div>

              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-12">
            <div class="card bg-white">
              <div class="card-body">
                <div class="card-block pt-2 pb-0">
                  <div class="media">
                    <div class="media-body white text-left">
                      <h4 class="font-medium-5 card-title mb-0">$@{{total|number}}</h4>
                      <span class="grey darken-1">Total Value</span>
                    </div>
                    <div class="media-right text-right">
                      <i class="icon-basket-loaded font-large-1 success"></i>
                    </div>
                  </div>
                </div>
                <div id="Widget-line-chart2" class="height-150 lineChartWidget WidgetlineChart2 mb-2">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Statistics cards Ends-->

        <!--Line with Area Chart 1 Starts-->
        <div class="row match-height">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-success" style="height: 145.6px;">
              <div class="card-body">
                <div class="px-3 py-3">
                  <div class="row text-white">
                    <div class="col-5">
                      <h1><i class="fa fa-user background-round text-white p-2 font-medium-3"></i></h1>
                      <h4 class="pt-1 m-0 text-white"></h4>
                    </div>
                    <div class="col-7 text-right pl-0">
                      <h4 class="text-white mb-2"><a class="text-white" href="/admin/customers">Customers</a></h4>
                      <!-- <span>90%</span> -->
                      <!-- <br> -->
                      <span>Good</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-danger" style="height: 145.6px;">
              <div class="card-body">
                <div class="px-3 py-3">
                  <div class="row text-white">
                    <div class="col-5">
                      <h1><i class="fa fa-star-o background-round text-white p-2 font-medium-3"></i></h1>
                      <h4 class="pt-1 m-0 text-white"></h4>
                    </div>
                    <div class="col-7 text-right pl-0">
                      <h4 class="text-white mb-2"><a class="text-white" href="/admin/products">Products</a></h4>
                      <!-- <span>39%</span> -->
                      <!-- <br> -->
                      <span>Average</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-info" style="height: 145.6px;">
              <div class="card-body">
                <div class="px-3 py-3">
                  <div class="row text-white">
                    <div class="col-5">
                      <h1><i class="fa fa-line-chart background-round text-white p-2 font-medium-3"></i></h1>
                      <h4 class="pt-1 m-0 text-white"></h4>
                    </div>
                    <div class="col-7 text-right pl-0">
                      <h4 class="text-white mb-2"><a class="text-white" href="/admin/orders">Orders</a></h4>
                      <!-- <span>60%</span> -->
                      <br>
                      <span>Good</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-warning" style="height: 145.6px;">
              <div class="card-body">
                <div class="px-3 py-3">
                  <div class="row text-white">
                    <div class="col-5">
                      <h1><i class="fa fa-rocket background-round text-white p-2 font-medium-3"></i></h1>
                      <h4 class="pt-1 m-0 text-white"></h4>
                    </div>
                    <div class="col-7 text-right pl-0">
                      <h4 class="text-white"><a class="text-white" href="/admin/suppliers">Suppliers</a></h4>
                      <!-- <span>980</span> -->
                      <br>
                      <span>Grate</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Line with Area Chart 1 Ends-->
      </div>
    </div>
  </div>

  <footer class="footer footer-static footer-light">
    <p class="clearfix text-muted text-center px-2"><span>Copyright &copy; 2022 <a href="#" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">Dra </a>, All rights reserved. </span></p>
  </footer>

</div>

@stop
@section('js')
<script src="/assets/admin/js/dashboard-ecommerce.js"></script>
<script src="/assets/js/controllers/admin/homeController.js"></script>
@stop