<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <meta name="csrf_token" content="{{csrf_token()}}">
  <title>Admin - Dra</title>
  <link rel="apple-touch-icon" sizes="60x60" href="/assets/admin/img/ico/apple-icon-60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/admin/img/ico/apple-icon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/assets/admin/img/ico/apple-icon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/admin/img/ico/apple-icon-152.png">
  <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/img/ico/favicon.ico">
  <link rel="shortcut icon" type="image/png" href="/assets/admin/img/ico/favicon-32.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/assets/admin/fonts/feather/style.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/prism.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/chartist.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/tagging.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/vendors/css/toastr.css">
  <link rel="stylesheet" type="text/css" href="/assets/admin/css/app.css">
</head>

<body data-col="2-columns" class=" 2-columns " ng-app="app" ng-controller="globalController">
  <!-- Start preloader -->
  <div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
      <div class="animation-preloader">
        <div class="pre-spinner"></div>
        <div class="txt-loading">
          <span data-text-preloader="L" class="letters-loading">
            L
          </span>

          <span data-text-preloader="O" class="letters-loading">
            O
          </span>

          <span data-text-preloader="A" class="letters-loading">
            A
          </span>

          <span data-text-preloader="D" class="letters-loading">
            D
          </span>

          <span data-text-preloader="I" class="letters-loading">
            I
          </span>

          <span data-text-preloader="N" class="letters-loading">
            N
          </span>

          <span data-text-preloader="G" class="letters-loading">
            G
          </span>
        </div>
      </div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="wrapper">

    <!-- Sidebar -->
    @include('includes.admin.sidebar')

    <!-- Header -->
    @include('includes.admin.header')

    <!-- Content -->
    @yield('content')
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block"><a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
    <div class="side-nav notification-sidebar-content">
      <div class="row">
        <div class="col-12 mt-1">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a id="base-tab1" data-toggle="tab" aria-controls="base-tab1" href="#activity-tab" aria-expanded="true" class="nav-link active"><strong>Activity</strong></a></li>
            <li class="nav-item"><a id="base-tab2" data-toggle="tab" aria-controls="base-tab2" href="#settings-tab" aria-expanded="false" class="nav-link"><strong>Settings</strong></a></li>
          </ul>
          <div class="tab-content">
            <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1" class="tab-pane active">
              <div id="activity-timeline" class="col-12 timeline-left">
                <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY</h6>
                <div class="timeline">
                  <ul class="list-unstyled base-timeline activity-timeline ml-0">
                    <li>
                      <div class="timeline-icon bg-danger"><i class="ft-shopping-cart"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-danger">Update</a><span class="d-block">Jim Doe Purchased new equipments for zonal office.</span></div><small class="text-muted">just now</small>
                    </li>
                    <li>
                      <div class="timeline-icon bg-primary"><i class="fa fa-plane"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-primary">Added</a><span class="d-block">Your Next flight for USA will be on 15th August 2015.</span></div><small class="text-muted">25 hours ago</small>
                    </li>
                    <li>
                      <div class="timeline-icon bg-dark"><i class="ft-mic"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-dark">Assined</a><span class="d-block">Natalya Parker Send you a voice mail for next conference.</span></div><small class="text-muted">15 days ago</small>
                    </li>
                    <li>
                      <div class="timeline-icon bg-warning"><i class="ft-map-pin"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-warning">New</a><span class="d-block">Jessy Jay open a new store at S.G Road.</span></div><small class="text-muted">20 days ago</small>
                    </li>
                    <li>
                      <div class="timeline-icon bg-primary"><i class="ft-inbox"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-primary">Added</a><span class="d-block">voice mail for conference.</span></div><small class="text-muted">2 Week Ago</small>
                    </li>
                    <li>
                      <div class="timeline-icon bg-danger"><i class="ft-mic"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-danger">Update</a><span class="d-block">Natalya Parker Jessy Jay open a new store at S.G Road.</span></div><small class="text-muted">1 Month Ago</small>
                    </li>
                    <li>
                      <div class="timeline-icon bg-dark"><i class="ft-inbox"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-dark">Assined</a><span class="d-block">Natalya Parker Send you a voice mail for Updated conference.</span></div><small class="text-muted">1 Month ago</small>
                    </li>
                    <li>
                      <div class="timeline-icon bg-warning"><i class="ft-map-pin"></i></div>
                      <div class="base-timeline-info"><a href="#" class="text-uppercase text-warning">New</a><span class="d-block">Started New project with Jessie Lee.</span></div><small class="text-muted">2 Month ago</small>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div id="settings-tab" aria-labelledby="base-tab2" class="tab-pane">
              <div id="settings" class="col-12">
                <h6 class="mt-1 mb-3 text-bold-400">GENERAL SETTINGS</h6>
                <ul class="list-unstyled">
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Notifications</span>
                        <div class="float-right">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="notifications1" checked="checked" type="checkbox" class="custom-control-input">
                              <label for="notifications1" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show recent activity</span>
                        <div class="float-right">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="recent-activity1" checked="checked" type="checkbox" class="custom-control-input">
                              <label for="recent-activity1" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Notifications</span>
                        <div class="float-right">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="notifications2" type="checkbox" class="custom-control-input">
                              <label for="notifications2" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show recent activity</span>
                        <div class="float-right">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="recent-activity2" type="checkbox" class="custom-control-input">
                              <label for="recent-activity2" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show your emails</span>
                        <div class="float-right">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="show-emails" type="checkbox" class="custom-control-input">
                              <label for="show-emails" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show Task statistics</span>
                        <div class="float-right">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="show-stats" checked="checked" type="checkbox" class="custom-control-input">
                              <label for="show-stats" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <!-- BEGIN VENDOR JS-->
  <script src="/assets/admin/vendors/js/core/jquery-3.3.1.min.js"></script>
  <script src="/assets/admin/vendors/js/core/popper.min.js"></script>
  <script src="/assets/admin/vendors/js/core/bootstrap.min.js"></script>
  <script src="/assets/admin/vendors/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="/assets/admin/vendors/js/prism.min.js"></script>
  <script src="/assets/admin/vendors/js/jquery.matchHeight-min.js"></script>
  <!-- <script src="/assets/admin/vendors/js/screenfull.min.js"></script> -->
  <script src="/assets/admin/vendors/js/pace/pace.min.js"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- <script src="/assets/admin/vendors/js/jquery.steps.min.js"></script> -->
  <script src="/assets/admin/vendors/js/tagging.min.js"></script>
  <script src="/assets/admin/vendors/js/chartist.min.js"></script>
  <script src="/assets/admin/vendors/js/jquery.validate.min.js"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- <script src="/assets/admin/vendors/js/jqBootstrapValidation.js"></script> -->
  <!-- <script src="/assets/admin/js/components-modal.min.js"></script> -->
  <script src="/assets/admin/vendors/js/toastr.min.js"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN CONVEX JS-->
  <script src="/assets/admin/js/notification-sidebar.js"></script>
  <!-- <script src="/assets/admin/js/form-validation.js"></script> -->
  <script src="/assets/admin/js/customizer.js"></script>
  <!-- END CONVEX JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="/assets/admin/js/tagging.js"></script>
  <!-- END PAGE LEVEL JS-->
  
  <script src="/assets/js/plugins/angular.min.js"></script>
  <script src="/assets/admin/vendors/js/dirPagination.js"></script>
  
  <script>
    const preLoader = function() {
      let preloaderWrapper = document.getElementById('preloader');
      window.onload = () => {
        preloaderWrapper.classList.add('loaded');
      };
    };
    preLoader();
  </script>

  <!-- Controller -->
  <script src="/assets/js/controllers/InitializationController.js"></script>
  <script src="/assets/js/controllers/globalController.js"></script>
  <script src="/assets/js/controllers/admin/headerController.js"></script>
  <script src="/assets/admin/js/app-sidebar.js"></script>
  <script src="/assets/vendor/ckeditor/ckeditor.js"></script>
  <script src="/assets/js/angular-ckeditor.js"></script>
  @yield('js')
</body>

</html>