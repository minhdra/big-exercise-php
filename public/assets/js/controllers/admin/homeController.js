const nameCustomers = 'customers/';
const nameProducts = 'products/';
const nameOrders = 'orders/';
app.controller('homeController', homeController);
function homeController($scope, $http) {
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
          // showAlert('error');
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
          // showAlert('error');
        }
      );
    }
  };
  // statistic users
  connect_api('GET', apiBase + nameCustomers, null, function (res) {
    $scope.countUsers = res.data.length;
  });
  // statistic products
  connect_api('GET', apiBase + nameProducts, null, function (res) {
    $scope.countProducts = res.data.products.length;
  });
  // statistic Sale
  connect_api('GET', apiBase + nameOrders, null, function (res) {
    $scope.total = 0;
    res.data.orders.forEach(item => {
      if (item.status_id == 5)
        $scope.total += item.total;
    })
  });
}