const nameCustomers = 'customers/';
const nameS = 'customer/';

app.controller('customersController', customersController);
function customersController($scope, $http) {
  $scope.title = 'Customers';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.serial = 1;
  $scope.checkRemember = false;
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
          // showAlert('success');
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
  // Get all customers
  const loadData = () => {
    connect_api('GET', apiBase + nameCustomers, null, function (res) {
      $scope.data = res.data;
    });
  };
  loadData();

  // ----------------------------------------------------------------
  $scope.checkLogin = () => {
    if (checkCustomerLogin().username) history.back();
  };

  $scope.login = () => {
    connect_api(
      'POST',
      apiBase + nameCustomers + 'login',
      $scope.requestLogin,
      function (res) {
        if (res.data.id) {
          showAlert('success');
          setTimeout(() => {
            if ($scope.checkRemember)
              localStorage.setItem('customer', JSON.stringify(res.data));
            else sessionStorage.setItem('customer', JSON.stringify(res.data));
            history.back();
          }, 1000);
        } else toastr.error('Username or password incorrect 👀');
      }
    );
  };

  $scope.register = () => {
    connect_api(
      'POST',
      apiBase + nameCustomers + 'register',
      $scope.registerModel,
      function (res) {
        console.log(res);
        if (res.data === 'true') {
          toastr.success('Register success 🐱‍🏍');
          $scope.registerModel = {};
        } else {
          toastr.error('Username already 🤷‍♀️');
        }
      }
    );
  };

  // Change state remember
  $scope.changedRemember = (state) => {
    $scope.checkRemember = state;
  };

  // Admin ----------------------------------------------------------------

  // open the modal in admin
  $scope.openModal = (id) => {
    $scope.id = id;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a customer';
      $scope.item = {};
      $scope.item.status = '1';
    } else {
      // Edit
      $scope.modalTitle = 'Edit a customer';
      $http({
        method: 'GET',
        url: apiBase + nameCustomers + id,
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
    if ($scope.id == 0) {
      console.log($scope.item);
      connect_api('POST', apiBase + nameCustomers, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      });
    } else {
      // is update
      connect_api(
        'PUT',
        apiBase + nameCustomers + $scope.id,
        $scope.item,
        function (res) {
          const index = $scope.data.findIndex((item) => item.id == $scope.id);
          $scope.data.splice(index, 1);
          $scope.data = [res.data, ...$scope.data];
          $('#large').modal('hide');
        }
      );
    }
  };

  // Remove item
  $scope.remove = (id) => {
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      connect_api('DELETE', apiBase + nameCustomers + id, null, function (res) {
        const index = $scope.data.findIndex((item) => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      });
    }
  };
}
