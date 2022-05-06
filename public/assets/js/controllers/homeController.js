const nameProduct = 'products/';
const nameOtherProduct = 'product/';
const nameSlide = 'slides/';

app.controller('homeController', homeController);
function homeController($scope, $http) {
  $scope.title = 'Products';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.colorIndex = 0;
  $scope.imageIndex = 0;
  $scope.radioCheck = false;
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
        console.log(res.data);
      }
    );
    // Get best sellers products
    connect_api(
      'GET',
      apiBase + nameOtherProduct + 'getSeller',
      null,
      function (res) {
        $scope.dataSeller = res.data;
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
      $scope.item.colors.forEach((item) => {
        item.sizes = $scope.item.sizes.filter(
          (s) => s.product_color_id === item.id
        );
        item.images = $scope.item.images.filter(
          (s) => s.product_color_id === item.id
        );
      });
      // $scope.pickColor($scope.colorIndex);
      console.log($scope.item);
    });
  };

  // Pick color in client detail view
  $scope.pickColor = (index) => {
    $scope.colorIndex = index;
  };
}
