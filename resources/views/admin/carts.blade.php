@extends('_layout_admin')
@section('content')
<div ng-controller="cartsController">
  <div class="main-panel">
    <div class="main-content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <!--Extended Table starts-->
          <div class="row">
            <div class="col-12">
              <h2 class="content-header">@{{title}}</h2>
              <!-- <p class="content-sub-header">Tables with some actions and with more feathers.</p> -->
            </div>
          </div>
          <section id="extended">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-success d-flex justify-content-between align-items-center">
                      <!-- <form class="form-group mb-0 d-flex">
                        <div class="position-relative has-icon-left">
                          <input type="text" class="form-control" name="form-control-with-icon" placeholder="Keyword..." ng-model="keyword">
                          <div class="form-control-position">
                            <i class="ft-search info"></i>
                          </div>
                        </div>
                      </form> -->
                      <!-- <button class="btn btn-danger mb-0 d-flex align-items-center" ng-click="openModal(0)"><i class="ft-plus"></i>Insert</button> -->
                      <div class="d-flex ml-4 align-items-center">
                        <label for="" class="mr-2">Customer</label>
                        <select class="form-control" name="customer" id="customer" ng-options="row.id as row.info.full_name for row in customers" ng-model="customer_id">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <table class="table table-responsive-md text-center ">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Total items</th>
                            <th style="width: 150px !important">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr dir-paginate="row in data|filter: {customer_id: customer_id}|itemsPerPage:10" current-page="currentPage">
                            <td>@{{$index + serial}}</td>
                            <td>@{{row.customer.info ? row.customer.info.full_name : row.customer.username}}</td>
                            <td>@{{row.details.length}}</td>
                            <td style="width: 150px !important">
                              <a class="info p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openModal(row.id, $index)">
                                <i class="fa fa-pencil font-medium-3"></i>
                              </a>
                              <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="remove(row.id)">
                                <i class="fa fa-trash-o font-medium-3"></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-sm-12 col-md-5">
                          <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing @{{data.length > 10 ? 10 : data.length}} of @{{data.length}} entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                          <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <dir-pagination-controls style="float: right; padding-right: 100px;" direction-links="true" boundary-links="true" on-page-change='indexCount(newPageNumber)'>
                            </dir-pagination-controls>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!--Extended Table Ends-->

        </div>
      </div>
    </div>

    
    @include('includes.admin.footer')
    
  </div>
  <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display:none; z-index:99999" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">@{{modalTitle}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body step js-steps-content" id="step1">
            <div class="row">
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="customer_id">Customer</label>
                  <select class="form-control" name="customer_id" id="customer_id" ng-options="row.id as row.info.full_name for row in customers" ng-model="item.customer_id">
                  </select>
                </fieldset>
              </div>
              <br>
              <div class="col-12 mb-1" ng-if="item.customer_id" class="">
                <table class="table table-responsive-md text-center ">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Image</th>
                      <th>Product</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <!-- <th style="width: 150px !important">Actions</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr dir-paginate="row in item.details|itemsPerPage:10" current-page="currentPage">
                      <td>@{{$index + serial}}</td>
                      <td>
                        <img ng-src="/assets/img/products/@{{row.image}}" alt="" style="width: 100px">
                      </td>
                      <td>@{{row.product.name}}</td>
                      <td>@{{row.color}}</td>
                      <td>@{{row.size}}</td>
                      <td>@{{row.single_price}}</td>
                      <td>@{{row.quantity}}</td>
                      <td>@{{row.quantity*row.single_price}}</td>
                      <!-- <td style="width: 150px !important">
                        <a class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openModal(row.id)">
                          <i class="fa fa-pencil font-medium-3"></i>
                        </a>
                        <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="remove(row.id)">
                          <i class="fa fa-trash-o font-medium-3"></i>
                        </a>
                      </td> -->
                    </tr>
                  </tbody>
                </table>
                <dir-pagination-controls style="float: right; padding-right: 100px;" direction-links="true" boundary-links="true" on-page-change='indexCount(newPageNumber)'>
                </dir-pagination-controls>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-primary" ng-click="saveData()">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<!-- <script src="/assets/admin/js/wizard-step.js"></script> -->
<script src="/assets/js/controllers/cartsController.js"></script>
@stop