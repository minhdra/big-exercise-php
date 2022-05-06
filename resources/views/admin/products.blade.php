@extends('_layout_admin')
@section('content')
<div ng-controller="productsController">
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
          <div class="form-body">
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
              <div class="col-xl-8 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="description">Description</label>
                  <textarea name="des" class="form-control" id="description" ng-model="item.description" rows="5"></textarea>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="form-body border-top d-flex justify-content-between flex-wrap pt-3 align-items-start">
            <div class="col-md-6 border-right pr-1">
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-6">
                  <h4>Variants</h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-6 mb-1">
                  <fieldset class="form-group">
                    <input type="text" class="form-control" id="color" ng-model="color.color" placeholder="Color">
                  </fieldset>
                </div>
                <div class="col-xl-4 col-lg-4 col-6 mb-1">
                  <button class="btn btn-primary" ng-click="addColor()">Add</button>
                  <button class="btn btn-info" ng-click="updateColor()">Update</button>
                </div>
              </div>
              <!-- Colors -->
              <table class="table table-hover text-center mb-3" ng-if="colors.length > 0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Color</th>
                    <th style="width: 150px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="row in colors">
                    <td>@{{$index + serial}}</td>
                    <td>@{{row.color}}</td>
                    <td style="width: 150px !important">
                      <a class="info p-0 mr-2" data-original-title="" title="Details" data-toggle="tooltip" ng-click="showDetails(row, $index, $event)">
                        <i class="ft-eye font-medium-3"></i>
                      </a>
                      <a class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openEditColor(row, $index)">
                        <i class="fa fa-pencil font-medium-3"></i>
                      </a>
                      <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="removeColor(row, $index)">
                        <i class="fa fa-trash-o font-medium-3"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="py-3 border-top d-flex align-items-start justify-content-between" ng-if="images">
                <h5>Images of variant</h5>
                <div>
                  <input type="file" id="file" name='file' accept="image/*" onchange="angular.element(this).scope().chooseImages(event)" multiple />
                  <!-- <input type="file" accept="image/*" name="file_img" id="img_files" class="w-100" multiple ng-class="images ? 'd-block' : 'd-none'" ng-change="chooseImages($event)" ng-model="ddddd"> -->
                </div>
              </div>
              <!-- Images -->
              <table class="table text-center " ng-if="images.length > 0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th style="width: 100px !important">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="row in images">
                    <td>@{{$index + serial}}</td>
                    <td>
                      <img ng-src="/assets/img/products/@{{row.image}}" alt="" style="width:50px;height:60px">
                    </td>
                    <td style="width: 100px !important">
                      <label for="file_single" class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="updateImage(row, $index)">
                        <i class="fa fa-pencil font-medium-3"></i>
                      </label>
                      <input type="file" id="file_single" name='file' accept="image/*" onchange="angular.element(this).scope().chooseImage(event)" style="display: none"/>
                      <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="removeImage(row, $index)">
                        <i class="fa fa-trash-o font-medium-3"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
            <div class="pl-1 col-md-6" ng-if="sizes">
              <div class="row">
                <div class="col-xl-2 col-lg-3 col-6">
                  <h5>Size</h5>
                </div>
                <div class="col-xl-3 col-lg-3 col-6 mb-1">
                  <fieldset class="form-group">
                    <input type="text" class="form-control" id="size" ng-model="size.size" placeholder="Size">
                  </fieldset>
                </div>
                <div class="col-xl-3 col-lg-3 col-6 mb-1">
                  <fieldset class="form-group">
                    <input type="number" class="form-control" id="quantity" ng-model="size.quantity" placeholder="Quantity">
                  </fieldset>
                </div>
                <div class="col-xl-4 col-lg-3 col-6 mb-1">
                  <button class="btn btn-danger" ng-click="addSize()">Add</button>
                  <button class="btn btn-info" ng-click="updateSize()">Update</button>
                </div>
                <table class="table table-hover text-center mb-3" ng-if="sizes.length > 0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Size</th>
                      <th>Quantity</th>
                      <th style="width: 100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="row in sizes">
                      <td>@{{$index + serial}}</td>
                      <td>@{{row.size}}</td>
                      <td>@{{row.quantity}}</td>
                      <td style="width: 100px !important">
                        <a class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openEditSize(row, $index)">
                          <i class="fa fa-pencil font-medium-3"></i>
                        </a>
                        <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="removeSize(row, $index)">
                          <i class="fa fa-trash-o font-medium-3"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
<script src="/assets/js/controllers/productsController.js"></script>
@stop