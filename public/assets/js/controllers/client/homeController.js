const nameProduct = 'products/';
const nameOtherProduct = 'product/';
const nameSlide = 'slides/';

app.controller('homeController', homeController);
function homeController($rootScope, $scope, $http) {
  $scope.title = 'Products';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.colorIndex = 0;
  $scope.sizeIndex = 0;
  $scope.imageIndex = 0;
  $scope.radioCheck = false;
  $scope.serial = 1;
  $scope.quantity = 1;
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

  // Get new products
  $scope.loadClientHome = () => {
    // Get sliders
    connect_api('GET', apiBase + nameSlide, null, function (res) {
      $scope.sliders = res.data;
    });
    // Get new products
    connect_api(
      'GET',
      apiBase + nameOtherProduct + 'getNew',
      null,
      function (res) {
        $scope.dataNew = res.data;
      }
    );
    // Get best sellers products
    connect_api(
      'GET',
      apiBase + nameOtherProduct + 'getSeller',
      null,
      function (res) {
        $scope.dataSeller = [];
        res.data.forEach((item) => {
          if (item.order_details.length > 0) {
            item.detailsLength = item.order_details.length;
            if ($scope.dataSeller.length > 9) return;
            $scope.dataSeller.push(item);
          }
        });
        $scope.dataSeller.sort((a, b) => b.detailsLength - a.detailsLength);
      }
    );
  };

  // Modal in client
  $scope.showQuickView = (id) => {
    $('#modal1').addClass('is-visible');
    // console.log(id);
    //Get single product
    connect_api('GET', apiBase + nameProduct + id, null, function (res) {
      $scope.item = res.data;
      // $scope.pickColor($scope.colorIndex);
    });
  };

  // Add to cart
  $scope.addCart = () => {
    const customer_id = checkCustomerLogin().id;

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

  // Increase or decrease the count
  $scope.changedCount = (index) => {
    if (index === 0) $scope.quantity++;
    else {
      if ($scope.quantity > 1) $scope.quantity--;
    }
  };

  // Pick color in client detail view
  $scope.pickColor = (index) => {
    $scope.colorIndex = index;
  };

  $scope.pickSize = (index) => {
    $scope.sizeIndex = index;
  };
}
