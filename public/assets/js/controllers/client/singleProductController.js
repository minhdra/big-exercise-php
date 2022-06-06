const nameProduct = 'products/';
let nameOtherProduct = 'product/';
const nameColor = 'colors/';
const nameImage = 'images/';
const nameSize = 'sizes/';

app.controller('singleProductController', singleProductController);
function singleProductController($rootScope, $scope, $http) {
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
  $scope.colorIndex = 0;
  $scope.sizeIndex = 0;
  $scope.quantity = 1;
  $scope.id = $('#product_id').val();

  // Get detail
  connect_api('GET', apiBase + nameProduct + $scope.id, null, function (res) {
    $scope.item = res.data;
    $("#des-single").html($scope.item.description);
    // $scope.pickColor($scope.colorIndex);
    // console.log($scope.item);
  });

  // Increase or decrease the count
  $scope.changedCount = (index) => {
    if (index === 0) $scope.quantity++;
    else {
      if ($scope.quantity > 1) $scope.quantity--;
    }
  };

  // Add to cart
  $scope.addCart = () => {
    const customer_id = checkCustomerLogin()?.id;

    $scope.detail = {
      product_id: $scope.item.id,
      quantity: $scope.quantity,
      single_price:
        $scope.item.price.price_current == 0
          ? $scope.item.price.price_origin
          : $scope.item.price.price_current,
      status: 1,
      size: $scope.item.colors[$scope.colorIndex].sizes[$scope.sizeIndex],
      image: $scope.item.colors[$scope.colorIndex].images[0],
      color: $scope.item.colors[$scope.colorIndex],
    };
    const cart = {
      customer_id,
      detail: $scope.detail,
    };

    if (!checkCustomerLogin().username) {
      window.location.href = '/login';
    } else {
      connect_api('POST', apiBase + nameCart, cart, function (res) {
        $rootScope.loadCart();
        $('#modal1').removeClass('is-visible');
      });
    }
  };

  // Pick color in client detail view
  $scope.pickColor = (index) => {
    $scope.colorIndex = index;
  };

  $scope.pickSize = (index) => {
    $scope.sizeIndex = index;
  };

  // Get similar products
  $scope.getSimilar = () => {
    connect_api(
      'GET',
      apiBase + nameProduct,
      null,
      function (res) {
        $scope.dataSimilar = res.data.products.filter(i => i.category.id === $scope.item.category.id).slice(0, 10);
      }
    );
  }
}