@extends('_layout_admin')
@section('content')
<div ng-controller="customersController">
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
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th style="width: 150px !important">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr dir-paginate="row in data|filter: {username: keyword}|itemsPerPage:10" current-page="currentPage">
                            <td>@{{$index + serial}}</td>
                            <td>@{{row.username}}</td>
                            <td>@{{row.password}}</td>
                            <td>
                              <button class="btn  btn-round" ng-class="row.status == 0 ? 'btn-outline-danger' : 'btn-outline-success'">
                                @{{row.status == 0 ? 'Block' : 'Active' }}
                              </button>
                            </td>
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
    <div class="modal-dialog modal-lg" role="document">
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
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" ng-model="item.username" require>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" ng-model="item.password" require>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                <fieldset class="form-group">
                  <label for="status">Active</label>
                  <select class="form-control" ng-model="item.status" id="status">
                    <option value="0">Block</option>
                    <option value="1">Active</option>
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
</div>
@stop

@section('js')
<!-- <script src="/assets/admin/js/wizard-step.js"></script> -->
<script src="/assets/js/controllers/customersController.js"></script>
@stop