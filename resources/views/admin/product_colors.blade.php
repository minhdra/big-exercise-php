@extends('_layout_admin')
@section('content')
<div ng-controller="product_colorsController">
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
          <section id="extended" class="">
            <!-- Colors -->
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
                          <label for="" class="mr-2">Filter</label>
                          <select class="form-control mb-0" id="basicSelect" ng-model="filterKey" ng-change="filter()">
                            <option value="0">All</option>
                            <option value="1">No images</option>
                          </select>
                        </div>
                        <div class="d-flex ml-4 align-items-center">
                          <label for="" class="mr-2">Product</label>
                          <select class="form-control mb-0" id="basicSelect" ng-options="option.id as option.name for option in products" ng-model="product_id">
                          </select>
                        </div>
                      </form>
                      <button class="btn btn-danger mb-0 d-flex align-items-center" ng-click="openModal('color', 0)"><i class="ft-plus"></i>Insert</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <table class="table table-responsive-md text-center ">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Color</th>
                            <th>Hex code</th>
                            <th>Number of Images</th>
                            <th style="width: 150px !important">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr dir-paginate="row in data|filter: {color: keyword, product_id: product_id}|itemsPerPage:10" current-page="currentPage">
                            <td>@{{$index + serial}}</td>
                            <td>@{{row.color}}</td>
                            <td>@{{row.hex}}</td>
                            <td align="right">@{{row.numOfImages}}</td>
                            <td style="width: 150px !important">
                              <a class="info p-0 mr-2" data-original-title="" title="Details" data-toggle="tooltip" ng-click="showDetails(row.id, row.images, row.sizes)">
                                <i class="ft-eye font-medium-3"></i>
                              </a>
                              <a class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openModal('color', row.id)">
                                <i class="fa fa-pencil font-medium-3"></i>
                              </a>
                              <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip">
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
            <div class="row justify-content-between">
              <div ng-if="itemImage.images" class="row col-xl-6">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title-wrap bar-success d-flex justify-content-between align-items-center">
                        <form class="form-group mb-0">
                          <!-- <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="form-control-with-icon" placeholder="Keyword..." ng-model="keyword">
                            <div class="form-control-position">
                              <i class="ft-search info"></i>
                            </div>
                          </div> -->
                        </form>
                        <div class="d-flex ">
                          <button class="btn btn-danger mb-0 d-flex align-items-center" ng-click="openModal('image', 0)"><i class="ft-plus"></i>Insert</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="card-block">
                        <table class="table table-responsive-md text-center ">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th style="width: 150px !important">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr dir-paginate="row in itemImage.images|itemsPerPage:10" current-page="currentPage">
                              <td>@{{$index + serial}}</td>
                              <td>
                                <img ng-src="/assets/img/products/@{{row.image}}" alt="" style="width:100px;height:100px">
                              </td>
                              <td style="width: 150px !important">
                                <a class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openModal('image', row.id)">
                                  <i class="fa fa-pencil font-medium-3"></i>
                                </a>
                                <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="remove('image', row.id)">
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
              <div ng-if="itemSize.sizes" class="row col-xl-6">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title-wrap bar-success d-flex justify-content-between align-items-center">
                        <form class="form-group mb-0">
                          <!-- <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="form-control-with-icon" placeholder="Keyword..." ng-model="keyword">
                            <div class="form-control-position">
                              <i class="ft-search info"></i>
                            </div>
                          </div> -->
                        </form>
                        <button class="btn btn-danger mb-0 d-flex align-items-center" ng-click="openModal('size', 0)"><i class="ft-plus"></i>Insert</button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="card-block">
                        <table class="table table-responsive-md text-center ">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Size</th>
                              <th>Quantity</th>
                              <th style="width: 150px !important">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr dir-paginate="row in itemSize.sizes|itemsPerPage:10" current-page="currentPage">
                              <td>@{{$index + serial}}</td>
                              <td>@{{row.size}}</td>
                              <td>@{{row.quantity}}</td>
                              <td style="width: 150px !important">
                                <a class="success p-0 mr-2" data-original-title="" title="Edit" data-toggle="tooltip" ng-click="openModal('size', row.id)">
                                  <i class="fa fa-pencil font-medium-3"></i>
                                </a>
                                <a class="danger p-0 mr-2" data-original-title="" title="Remove" data-toggle="tooltip" ng-click="remove('size', row.id)">
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
            </div>
          </section>
          <!--Extended Table Ends-->

        </div>
      </div>
    </div>


    @include('includes.admin.footer')

  </div>
  <!-- Modal color -->
  <div class="modal fade text-left" id="color-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display:none; z-index:99999" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">@{{modalTitle1}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body step js-steps-content" id="step1">
            <div class="row">
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="item-color">Color</label>
                  <input type="text" class="form-control" id="item-color" ng-model="color.color" require>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="hex">Hex</label>
                  <input type="text" class="form-control" id="hex" ng-model="color.hex" require>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="product">Product</label>
                  <select class="form-control" id="product" ng-model="color.product_id">
                    <option value="@{{option.id}}" ng-repeat="option in products">@{{option.name}}</option>
                  </select>
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
  <!-- Modal image -->
  <div class="modal fade text-left" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display:none; z-index:99999" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">@{{modalTitle2}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body">
            <div class="row">
              <div class="col-xl-8 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="img_files">Images</label>
                  <input type="file" accept="image/*" name="file_img" id="img_files" multiple>
                  <div class="row d-flex">
                    <img id="list_img_prv@{{img}}" ng-src="/assets/img/products/@{{row}}" style="max-width: 150px;max-height: 150px" class="list-images" alt="" ng-repeat="img in tmpArr">
                  </div>
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
  <!-- Modal size-->
  <div class="modal fade text-left" id="size-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display:none; z-index:99999" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">@{{modalTitle3}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body">
            <div class="row">
              <div class="col-xl-8 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="size">Size</label>
                  <input type="text" name="file_img" id="size" ng-model="size.size">
                </fieldset>
              </div>
              <div class="col-xl-8 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text" name="file_img" id="quantity" ng-model="size.quantity">
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
<script src="/assets/js/controllers/product_colorsController.js"></script>
@stop