const nameDelivery = 'delivery_addresses/';
const nameS = 'delivery_address/';

app.controller('delivery_addressesController', delivery_addressesController);
function delivery_addressesController($scope, $http) {
  $scope.title = 'Delivery Addresses';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
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
  // Get all delivery_addresses
  const loadData = () => {
    connect_api('GET', apiBase + nameDelivery, null, function (res) {
      $scope.data = res.data;
    });
  };
  loadData();

  // open the modal in admin
  $scope.openModal = (id) => {
    $scope.id = id;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a delivery_address';
      $scope.item = {};
      
    } else { // Edit
      $scope.modalTitle = 'Edit a delivery_address';
      $http({
        method: 'GET',
        url: apiBase + nameDelivery + id,
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
      connect_api('POST', apiBase + nameDelivery, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      })
    } else
    { // is update
      connect_api('PUT', apiBase + nameDelivery + $scope.id, $scope.item, function (res) {
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
      connect_api('DELETE', apiBase + nameDelivery + id, null, function (res) {
        const index = $scope.data.findIndex(item => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      })
    }
  }
}
