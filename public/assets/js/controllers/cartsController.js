const nameCart = 'carts/';
const nameCartDetail = 'cart_details/';

app.controller('cartsController', cartsController);
function cartsController($scope, $http) {
  $scope.title = 'Carts';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.customer_id = '';
  $scope.serial = 1;
  $scope.indexCount = function (newPageNumber) {
    $scope.serial = newPageNumber * 10 - 9;
  };
  $scope.item = {};

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
  // Get all carts
  const loadData = () => {
    connect_api('GET', apiBase + nameCart, null, function (res) {
      $scope.data = res.data.carts;
      $scope.customers = res.data.customers;
      console.log(res.data);
    });
  };
  loadData();

  // open the modal in cart
  $scope.openModal = (id, index) => {
    $scope.index = index;
    $scope.id = id;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a cart';
      $scope.item = {};
    } else { // Edit
      $scope.modalTitle = 'Edit a cart';
      $http({
        method: 'GET',
        url: apiBase + nameCart + id,
      }).then(
        (res) => {
          $scope.item = res.data; 
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
      connect_api('POST', apiBase + nameCart, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      })
    } else
    { // is update
      connect_api('PUT', apiBase + nameCart + $scope.id, $scope.item, function (res) {
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
      connect_api('DELETE', apiBase + nameCart + id, null, function (res) {
        const index = $scope.data.findIndex(item => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      })
    }
  }
}
