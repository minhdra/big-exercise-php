const nameOrder = 'orders/';

app.controller('trackingController', trackingController);
function trackingController($rootScope, $scope, $http) {
  // Define connect api
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
        },
        (error) => {
          console.log(error);
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
        }
      );
    }
  };

  $scope.trackingOrder = () => {
    if ($scope.order_id)
    {
      connect_api('POST', apiBase + nameOrder + 'tracking', {id: $scope.order_id, customer_id: $rootScope.customer.id }, function (res) {
        if (res.data)
        {
          $scope.order = res.data;
        }
        else
        {
          toastr.info('Cannot found order');
        }
      })
    }
    else
    {
      toastr.info('You need order id');
    }
  }

  // Cancel order 
  $scope.cancelOrder = () => {
    const ask = "Are you sure you want to cancel";
    if (confirm(ask))
    {
      $scope.order.status_id = 6;
      connect_api('PUT', apiBase + nameOrder + $scope.order.id, $scope.order, function (res) {
        toastr.success('You cancelled order successfully');
        $scope.order = res.data;
      });
    }
  }
}
