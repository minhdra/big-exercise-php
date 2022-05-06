const nameCustomers = 'customers/';
app.controller('headerClientController', headerClientController);
function headerClientController($rootScope, $http) {
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
  $rootScope.customer = {};
  $rootScope.check = checkCustomerLogin();

  $rootScope.loadCart = () => {
    if ($rootScope.check.id) {
      connect_api(
        'GET',
        apiBase + nameCustomers + $rootScope.check.id,
        null,
        function (res) {
          $rootScope.customer = res.data;
          $rootScope.countTotal();
        }
      );
    }
  };
  $rootScope.loadCart();

  // Count total
  $rootScope.countTotal = () => {
    $rootScope.total = 0;
    $rootScope.total = $rootScope.customer.cart_details.reduce(
      (prev, cur) => prev + cur.single_price * cur.quantity,
      $rootScope.total
    );
  };

  // Increase or decrease the count
  $rootScope.changedCount = (check, index) => {
    $rootScope.customer.cart_details[index].quantity;
    if (check === 0) $rootScope.customer.cart_details[index].quantity++;
    else {
      if ($rootScope.customer.cart_details[index].quantity > 1)
        $rootScope.customer.cart_details[index].quantity--;
    }

    connect_api(
      'PUT',
      apiBase + nameCartDetail + $rootScope.customer.cart_details[index].id,
      $rootScope.customer.cart_details[index],
      function (res) {
        $rootScope.countTotal();
      }
    );
  };

  // Remove
  $rootScope.remove = (id, index) => {
    connect_api('DELETE', apiBase + nameCartDetail + id, null, function (res) {
      $rootScope.customer.cart_details.splice(index, 1);
      $rootScope.countTotal();
    });
  };
}
