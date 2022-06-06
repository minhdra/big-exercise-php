const nameProduct = 'products/';
let nameOtherProduct = 'product/';
const nameColor = 'colors/';
const nameImage = 'images/';
const nameSize = 'sizes/';

app.controller('shopController', shopController);
function shopController($rootScope, $scope, $http) {
  $scope.search = {
    category_id: $('#category_id').val() || undefined,
    name: $('#keyword').val(),
  };
  $scope.title = 'Products';
  $scope.itemsPerPage = 16;
  $scope.itemsPerPageList = 16;
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.colorIndex = 0;
  $scope.sizeIndex = 0;
  // $scope.images = [];
  $scope.serial = 1;
  $scope.indexCount = function (newPageNumber) {
    $scope.serial = newPageNumber * 10 - 9;
  };
  $scope.item = {};
  $scope.quantity = 1;
  $scope.option = 'all';
  $scope.sortOptions = [
    {
      label: 'All',
      value: 'all',
    },
    {
      label: 'Name ASC',
      value: 'name asc',
    },
    {
      label: 'Name DESC',
      value: 'name desc',
    },
    {
      label: 'Price ASC',
      value: 'price asc',
    },
    {
      label: 'Price DESC',
      value: 'price desc',
    },
  ];
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
  // Get all products
  const loadData = () => {
    if ($scope.search.name || $scope.search.category_id) {
      connect_api('POST', apiBase + 'products/search', $scope.search, function (res) {
        $scope.data = res.data.products;
        $scope.dataBeforeSort = JSON.parse(JSON.stringify($scope.data));
        $scope.dataRoot = JSON.parse(JSON.stringify($scope.data));
        $rootScope.keyword = $scope.search.name;
        $rootScope.selectedCategory = Number.parseInt($scope.search.category_id);
        $scope.brands = res.data.brands;
      });
    }
    else
    {
      connect_api('GET', apiBase + nameProduct, null, function (res) {
        const all = {
          id: undefined,
          name: 'All',
          color: 'All',
        };
        $scope.data = res.data.products;
        $scope.dataBeforeSort = JSON.parse(JSON.stringify($scope.data));
        $scope.dataRoot = JSON.parse(JSON.stringify($scope.data));
        $scope.categories = res.data.categories;
        $scope.brands = res.data.brands;
        $scope.colorsD = res.data.colors;
        $scope.suppliers = res.data.suppliers;
        $scope.totalItems = $scope.data.length;
  
        $scope.categories.unshift(all);
        $scope.brands.unshift(all);
        $scope.colorsD.unshift(all);
        $scope.suppliers.unshift(all);
      });
    }
  };
  loadData();

  // Changed categories
  $scope.changedCategories = (category_id) => {
    $scope.search.category_id = category_id;
    location.href = `/shop?category=${category_id}&keyword=${$scope.search.keyword||''}`;
  }

  // Modal in client
  $scope.showQuickView = (id) => {
    $('#modal1').addClass('is-visible');
    // console.log(id);
    //Get single product
    connect_api('GET', apiBase + nameProduct + id, null, function (res) {
      $scope.item = res.data;
      // console.log($scope.item);
    });
  };

  // Add to cart
  $scope.addCart = () => {
    const customer_id = JSON.parse(sessionStorage.getItem('customer')).id;

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

  // Open colors page
  $scope.openDetailPage = (id) => {
    sessionStorage.setItem('product_id', id);
  };

  // Pick color in client detail view
  $scope.pickColor = (index) => {
    $scope.colorIndex = index;
  };

  $scope.pickSize = (index) => {
    $scope.sizeIndex = index;
  };

  // Sorted list
  // Sort
  $scope.sorted = (option) => {
    switch (option) {
      case 'all':
        $scope.data = $scope.dataBeforeSort;
        break;
      case 'name asc':
        $scope.data.sort((a, b) => {
          return sortNameAsc(a, b);
        });
        break;
      case 'name desc':
        $scope.data.sort((a, b) => {
          return sortNameDesc(a, b);
        });
        break;
      case 'price asc':
        $scope.data.sort((a, b) => {
          return sortPriceAsc(a, b);
        });
        break;
      case 'price desc':
        $scope.data.sort((a, b) => {
          return sortPriceDesc(a, b);
        });
        break;

      default:
        toastr.warning('Bạn chọn sai rồi 😥');
        break;
    }
  };

  // Sort name ascending
  const sortNameAsc = (a, b) => {
    const nameA = a.name.toUpperCase(); // ignore upper and lowercase
    const nameB = b.name.toUpperCase(); // ignore upper and lowercase
    if (nameA < nameB) {
      return -1;
    }
    if (nameA > nameB) {
      return 1;
    }

    // names must be equal
    return 0;
  };

  // Sort name descending
  const sortNameDesc = (a, b) => {
    const nameA = a.name.toUpperCase(); // ignore upper and lowercase
    const nameB = b.name.toUpperCase(); // ignore upper and lowercase
    if (nameA > nameB) {
      return -1;
    }
    if (nameA < nameB) {
      return 1;
    }

    // names must be equal
    return 0;
  };

  // Sort price ascending
  const sortPriceAsc = (a, b) => {
    return a.price.price_origin - b.price.price_origin;
  }

  // Sort price descending
  const sortPriceDesc = (a, b) => {
    return b.price.price_origin - a.price.price_origin;
  }
}


