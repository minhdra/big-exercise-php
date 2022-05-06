@extends('_layout_admin')
@section('content')
<div ng-controller="ProductController">
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
                      <form class="form-group mb-0 d-flex">
                        <div class="position-relative has-icon-left">
                          <input type="text" class="form-control" name="form-control-with-icon" placeholder="Keyword..." ng-model="keyword">
                          <div class="form-control-position">
                            <i class="ft-search info"></i>
                          </div>
                        </div>
                        <div class="d-flex ml-4 align-items-center">
                          <label for="" class="mr-2">Category</label>
                          <select class="form-control mb-0" id="basicSelect" ng-options="option.id as option.name for option in categories" ng-model="category_id">
                          </select>
                        </div>
                        <div class="d-flex ml-4 align-items-center">
                          <label for="" class="mr-2">Supplier</label>
                          <select class="form-control mb-0" id="basicSelect" ng-options="option.id as option.name for option in suppliers" ng-model="supplier_id">
                          </select>
                        </div>
                      </form>
                      <button class="btn btn-danger mb-0 d-flex align-items-center" ng-click="openModal(0)"><i class="ft-plus"></i>Insert</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <table class="table table-responsive-md text-center ">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Made in</th>
                            <th>Gender</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Price($)</th>
                            <th style="width: 150px !important">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr dir-paginate="row in data|filter: {name: keyword, category_id: category_id, supplier_id: supplier_id}|itemsPerPage:10" current-page="currentPage">
                            <td>@{{$index + serial}}</td>
                            <td>@{{row.name}}</td>
                            <td>@{{row.categories.name}}</td>
                            <td>@{{row.supplier.name}}</td>
                            <td>@{{row.made_in}}</td>
                            <td>@{{row.gender ? 'Male' : 'Female'}}</td>
                            <td>@{{row.brands.name}}</td>
                            <td>
                              <img ng-if="row.image_first" ng-src="/assets/img/products/@{{row.image_first}}" alt="" style="width: 100px">
                            </td>
                            <td align="right">@{{row.price.price_current == 0 ? row.price.price_origin : row.price.price_current}}</td>
                            <td style="width: 150px !important">
                              <a class="info p-0 mr-2" data-original-title="" title="Details" data-toggle="tooltip" ng-click="openDetailPage(row.id)" href="/admin/product_colors">
                                <i class="ft-eye font-medium-3"></i>
                              </a>
                              <a class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openModal(row.id)">
                                <i class="fa fa-pencil font-medium-3"></i>
                              </a>
                              <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="remove(row.id)">
                                <i class="fa fa-trash-o font-medium-3"></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <dir-pagination-controls style="float: right; padding-right: 100px;" direction-links="true" boundary-links="true" on-page-change='indexCount(newPageNumber)'>
                      </dir-pagination-controls>
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
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">@{{modalTitle}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body step js-steps-content" id="step1">
            <div class="row">
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="item-name">Name</label>
                  <input type="text" class="form-control" id="item-name" ng-model="item.name" require>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" name="category" id="category" ng-model="item.category_id">
                    <option ng-repeat="option in categories" value="@{{option.id}}">@{{option.name}}</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="gender">Gender</label>
                  <select class="form-control" name="gender" id="gender" ng-model="item.gender">
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                    <option value="2">Others</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="brand">Brand</label>
                  <select class="form-control" name="brand" id="brand" ng-model="item.brand_id">
                    <option ng-repeat="option in brands" value="@{{option.id}}">@{{option.name}}</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="supplier">Supplier</label>
                  <select class="form-control" name="supplier" id="supplier" ng-model="item.supplier_id">
                    <option ng-repeat="option in suppliers" value="@{{option.id}}">@{{option.name}}</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="price_origin">Price ($)</label>
                  <input type="number" class="form-control" id="price_origin" ng-model="item.price.price_origin" min="0" require>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="made_in">Made in</label>
                  <input type="text" class="form-control" id="made_in" ng-model="item.made_in" require>
                </fieldset>
              </div>
              <div class="col-xl-8 col-lg-6 col-md-12 mb-1" ng-if="id == 0">
                <fieldset class="form-group">
                  <label for="colors">Colors</label>
                  <div class="case-sensitive form-control tagging" id="colors-box" data-tags-input-name="case-sensitive"></div>
                </fieldset>
                <fieldset class="form-group">
                  <div for="">Choose color</div>
                  <div class="btn-group">
                    <button class="btn btn-primary dropdown-toggle mb-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Colors list
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                      <a class="dropdown-item" ng-repeat="row in colors" ng-click="chooseColor(row.color)">@{{row.color}}</a>
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="img_file1_upid">First image </label>
                  <input type="file" accept="image/*" name="file_img" id="img_file1_upid">
                  <div class="row">
                    <img ng-if="item.image_first != '' || item.image_first!=null" ng-src="/assets/img/products/@{{item.image_first}}" id="img_prv1" style="max-width: 150px;max-height: 150px" class="img-thumbnail" alt="">
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="img_file2_upid">Second image </label>
                  <input type="file" accept="image/*" name="file_img" id="img_file2_upid">
                  <div class="row">
                    <img ng-if="item.image_second != '' || item.image_second!=null" ng-src="/assets/img/products/@{{item.image_second}}" id="img_prv2" style="max-width: 150px;max-height: 150px" class="img-thumbnail" alt="">
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="description">Mô tả</label>
                  <textarea name="des" class="form-control" id="description" ng-model="item.description" rows="8"></textarea>
                </fieldset>
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
<script src="/assets/js/controllers/ProductController.js"></script>
@stop