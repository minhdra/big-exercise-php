const nameAdmin = 'admins/';
const nameS = 'admin/';

app.controller('adminsController', adminsController);
function adminsController($scope, $http) {
  $scope.title = 'Customers';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.serial = 1;
  $scope.indexCount = function (newPageNumber) {
    $scope.serial = newPageNumber * 10 - 9;
  };
  $scope.item = {};
  $scope.item.status = '1';

  var connect_api = function (method, url, data, callback) {
    if (data) {
      $http({
        method: method,
        url: url,
        data: data,
        'content-Type': 'application/json',
      }).then(
        function (response) {
          callback(response);
          showAlert('success');
        },
        (error) => {
          console.log(error);
          showAlert('error');
        }
      );
    } else {
      $http({
        method: method,
        url: url,
        'content-Type': 'application/json',
      }).then(
        function (response) {
          callback(response);
          // showAlert('success');
        },
        (error) => {
          console.log(error);
          showAlert('error');
        }
      );
    }
  };
  // Get all admins
  const loadData = () => {
    connect_api('GET', apiBase + nameAdmin, null, function (res) {
      $scope.data = res.data;
      console.log($scope.data);
    });
  };
  loadData();

  // ----------------------------------------------------------------
  $scope.checkLogin = () => {
    if(checkCustomerLogin().username) history.back();
  }
  
  $scope.login = () => {
    connect_api('POST', apiBase + nameAdmin + 'login', $scope.requestLogin, function (res) {
      sessionStorage.setItem('admin', JSON.stringify(res.data));
      history.back();
    })
  }


  // Admin ----------------------------------------------------------------

  // open the modal in admin
  $scope.openModal = (id) => {
    $scope.id = id;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a admin';
      $scope.item = {};
      $scope.item.status = '1';
    } else { // Edit
      $scope.modalTitle = 'Edit a admin';
      $http({
        method: 'GET',
        url: apiBase + nameAdmin + id,
      }).then(
        (res) => {
          $scope.item = res.data; // item is already
          $scope.item.status = $scope.item.status + '';
          // console.log($scope.item);
        },
        (error) => console.log(error)
      );
    }
    $('#large').modal('show');
  };

  // Save data
  $scope.saveData = () => {
    // is create
    if ($scope.id == 0)
    {
      console.log($scope.item);
      connect_api('POST', apiBase + nameAdmin, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      })
    } else
    { // is update
      connect_api('PUT', apiBase + nameAdmin + $scope.id, $scope.item, function (res) {
        const index = $scope.data.findIndex(item => item.id == $scope.id);
        $scope.data.splice(index, 1);
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      })
    }

  }

  // Remove item
  $scope.remove = (id) => {
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm))
    {
      connect_api('DELETE', apiBase + nameAdmin + id, null, function (res) {
        const index = $scope.data.findIndex(item => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      })
    }
  }
}
