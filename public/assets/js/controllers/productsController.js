const nameController = 'products/';
const nameSelf = 'product/';
const nameColor = 'colors/';
const nameImage = 'images/';
const nameSize = 'sizes/';

app.controller('productsController', productsController);
function productsController($scope, $http) {
  $scope.title = 'Products';
  $scope.itemsPerPage = 16;
  $scope.itemsPerPageList = 16;
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.colorIndex = 0;
  // $scope.images = [];
  $scope.imageIndex = 0;
  $scope.radioCheck = false;
  $scope.serial = 1;
  $scope.indexCount = function (newPageNumber) {
    $scope.serial = newPageNumber * 10 - 9;
  };
  $scope.item = {};
  $scope.color = {};
  $scope.size = {};
  $scope.colors = [];
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
  // Get all products
  const loadData = () => {
    connect_api('GET', apiBase + nameController, null, function (res) {
      const all = {
        id: undefined,
        name: 'All',
        color: 'All',
      };
      $scope.data = res.data.products;
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
  };
  loadData();

  // Get new products
  $scope.loadClientHome = () => {
    // Get new products
    connect_api(
      'GET',
      apiBase + nameController + 'getNew',
      null,
      function (res) {
        $scope.dataNew = res.data;
      }
    );
    // Get best sellers products
    connect_api(
      'GET',
      apiBase + nameController + 'getSeller',
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
    $http({
      method: 'GET',
      url: apiBase + nameController + id,
    }).then(
      (res) => {
        $scope.item = res.data;
        $scope.pickColor($scope.colorIndex);
        console.log($scope.item);
      },
      (error) => console.log(error)
    );
  };

  // open the modal in admin
  $scope.openModal = (id) => {
    $scope.id = id;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a product';
      $scope.item = {};
      $scope.colors = [];
      $scope.color = {};
      $scope.size = {};
      $scope.sizes = undefined;
      $scope.image = {};
      $scope.images = undefined;
    } else {
      // Edit
      $scope.modalTitle = 'Edit a product';
      $scope.colors = [];
      $scope.color = {};
      $scope.size = {};
      $scope.sizes = undefined;
      $scope.image = {};
      $scope.images = undefined;
      $http({
        method: 'GET',
        url: apiBase + nameController + id,
      }).then(
        (res) => {
          $scope.item = res.data; // item is already
          $scope.item.gender = '' + $scope.item.gender;
          $scope.item.brand_id = '' + $scope.item.brand_id;
          $scope.item.category_id = '' + $scope.item.category_id;
          $scope.item.supplier_id = '' + $scope.item.supplier_id;
          $scope.colors = $scope.item.colors ? $scope.item.colors : [];
          $scope.colors.forEach(item => {
            item.sizes = $scope.item.sizes.filter(s => s.product_color_id === item.id);
            item.images = $scope.item.images.filter(s => s.product_color_id === item.id);
          })
          console.log($scope.item);
        },
        (error) => console.log(error)
      );
    }
    $('#large').modal('show');
  };

  // Save data
  $scope.saveData = () => {
    // is create
    $scope.item.colors = $scope.colors;
    if ($scope.id == 0) {
      console.log($scope.item);
      connect_api(
        'POST',
        apiBase + nameController,
        $scope.item,
        function (res) {
          $scope.data = [res.data, ...$scope.data];
        }
      );
    } else {
      console.log($scope.item);
      // is update
      connect_api(
        'PUT',
        apiBase + nameController + $scope.id,
        $scope.item,
        function (res) {
          const index = $scope.data.findIndex((item) => item.id == $scope.id);
          $scope.data.splice(index, 1);
          $scope.data = [res.data, ...$scope.data];
        }
      );
    }

    $('#large').modal('hide');
  };

  // Remove item
  $scope.remove = (id) => {
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      connect_api(
        'DELETE',
        apiBase + nameController + id,
        null,
        function (res) {
          const index = $scope.data.findIndex((item) => item.id == id);
          $scope.data.splice(index, 1);
          showAlert('success');
        }
      );
    }
  };

  // ---------------------------------------------------------------- Colors

  $scope.addColor = () => {
    $scope.color_id = undefined;
    if (!$scope.color || !$scope.color.color)
      toastr.warning('Color cannot undefined');
    else {
      const color = convertToJson($scope.color);
      let ok = true;
      $scope.colors.forEach((item) => {
        if (item.color === color.color) {
          ok = false;
          toastr.warning('Cannot duplicate color');
          return;
        }
      });
      if (ok) {
        $scope.colors = [color, ...$scope.colors];
        $scope.color = {};
      }
    }
  };

  $scope.openEditColor = (color, index) => {
    // $scope.color_id = color.id;
    $scope.index = index;
    $scope.color.color = color.color;
    $scope.color.id = color.id;
  };

  $scope.updateColor = () => {
    if (!$scope.color || !$scope.color.color)
      toastr.warning('Color cannot undefined');
    else {
      // $scope.color.product_id = $scope.id;
      const color = convertToJson($scope.color);
      let ok = true;
      $scope.colors.forEach((item) => {
        if (item.color === color.color) {
          ok = false;
          toastr.warning('Cannot duplicate color');
          return;
        }
      });
      if (ok)
      {
        $scope.colors[$scope.index] = color;
        $scope.color = {};
      }
    }
  };

  $scope.removeColor = (color, index) => {
    const color_id = color.id;
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      $scope.colors.splice(index, 1);
      if (color_id)
      {
        connect_api('DELETE', apiBase + nameColor + color_id, null, function (res) {
          showAlert('success');
        })
      }
    }
  };

  $scope.showDetails = (row, index, ev) => {
    $scope.btnDetail = $(ev.currentTarget);
    $scope.index = index;
    $scope.images = $scope.colors[index].images ?? [];
    $scope.sizes = $scope.colors[index].sizes ?? [];
    // console.log($scope.sizes);
  }

  // ---------------------------------------------------------------- End colors

  // ---------------------------------------------------------------- Start images

  $scope.removeImage = (image, index) => {
    const image_id = image.id;
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      $scope.images.splice(index, 1);
      $scope.colors[$scope.index].images = $scope.images;
      if (image_id)
      {
        connect_api('DELETE', apiBase + nameImage + image_id, null, function (res) {
          showAlert('success');
        })
      }
    }
  }

  $scope.updateImage = (image, index) => {
    $scope.image_id = image.id;
    $scope.indexImage = index;
    $scope.image = image;
  }

  $scope.chooseImage = (ev) => {
    uploadFile(ev.target.files[0]);
  }

  $scope.updateImageDB = () => {
    connect_api('PUT', apiBase + nameImage + $scope.image_id, $scope.image, function (res) {
      $scope.colors[$scope.index].images = $scope.images;
    })
  }

  // ---------------------------------------------------------------- End images

  // ---------------------------------------------------------------- Start size

  $scope.addSize = () => {
    $scope.size_id = undefined;
    if (!$scope.size || !$scope.size.size || !$scope.size.quantity)
      toastr.warning('Must require');
    else {
      const size = convertToJson($scope.size);
      let ok = true;
      $scope.sizes.forEach((item) => {
        if (item.size === size.size) {
          ok = false;
          toastr.warning('Cannot duplicate size');
          return;
        }
      });
      if (ok) {
        $scope.sizes = [size, ...$scope.sizes];
        $scope.size = {};
        $scope.colors[$scope.index].sizes = $scope.sizes;
      }
    }
  };

  $scope.openEditSize = (size, index) => {
    // $scope.color_id = color.id;
    $scope.indexSize = index;
    $scope.size.id = size.id;
    $scope.size.product_color_id = size.product_color_id;
    $scope.size.size = size.size;
    $scope.size.quantity = size.quantity;
  };

  $scope.updateSize = () => {
    if (!$scope.size || !$scope.size.size || !$scope.size.quantity)
      toastr.warning('Must require');
    else {
      // $scope.color.product_id = $scope.id;
      const size = convertToJson($scope.size);
      $scope.sizes[$scope.indexSize] = size;
      $scope.colors[$scope.index].sizes = $scope.sizes;
      $scope.size = {};
    }
  };

  $scope.removeSize = (size, index) => {
    const size_id = size.id;
    console.log(size_id)
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      $scope.sizes.splice(index, 1);
      $scope.colors[$scope.index].sizes = $scope.sizes;
      if (size_id)
      {
        connect_api('DELETE', apiBase + nameSize + size_id, null, function (res) {
          showAlert('success');
        })
      }
    }
  };

  // ---------------------------------------------------------------- End size

  // Convert to json
  const convertToJson = function (text) {
    return JSON.parse(JSON.stringify(text));
  };

  // Open colors page
  $scope.openDetailPage = (id) => {
    sessionStorage.setItem('product_id', id);
  };

  // Pick color in client detail view
  $scope.pickColor = (index) => {
    $scope.colorIndex = index;
    $scope.images = $scope.item.image.filter(
      (image) =>
        image.product_color_id === $scope.item.color[$scope.colorIndex].id
    );
  };

  // Upload file
  var uploadFile = function (filedata, type = 'img') {
    var imgtype = filedata.type;
    $scope.image.image = filedata.name;
    $scope.images.forEach(function (item, index) {
      if (index === $scope.indexImage) item = $scope.image;
    });
    $scope.colors[$scope.index].images = $scope.images;
    $scope.updateImageDB();
    //upload
    var postData = new FormData();
    postData.append('file', filedata);
    postData.append('type', type);

    $.ajax({
      headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
      async: true,
      type: 'post',
      contentType: false,
      processData: false,
      url: apiBase + nameSelf + 'upload',
      data: postData,
      success: function (res) {
        console.log('success');
      },
      error: function (res) {
        console.log('loi');
      },
    });
  };

  // Upload files
  var uploadFiles = function (filedata, type = 'img') {
    var imgtype = filedata.type;

    var postData = new FormData();
    let images = $scope.colors[$scope.index].images ?? [];
    filedata.forEach((item, index) => {
      images.push({image: item.name});
      (function (file) {
        var reader = new FileReader();
        reader.onload = function (ev) {
          $('#list_img_prv' + index)
            .attr('src', ev.target.result)
            .css('width', '150px')
            .css('object-fit', 'cover');
        };
        reader.readAsDataURL(file);
      })(item);
      postData.append(`file${index}`, item);
      postData.append('type', type);
    });
    
    $scope.colors[$scope.index].images = images;
    // $scope.images = images;

    $.ajax({
      headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
      async: true,
      type: 'post',
      contentType: false,
      processData: false,
      url: apiBase + nameSelf + 'uploads',
      data: postData,
      success: function (res) {
        console.log('success');
      },
      error: function (res) {
        console.log('loi', res);
      },
    });

    return images;
  };

  // $('#img_file1_upid').on('change', function (ev) {
  //   var filedata = this.files[0];
  //   uploadFile(filedata, 1);
  // });
  // $('#img_file2_upid').on('change', function (ev) {
  //   var filedata = this.files[0];
  //   uploadFile(filedata, 2);
  // });
  
  $scope.chooseImages = (ev) => {
    var filedata = Array.from(ev.target.files);
    uploadFiles(filedata);
    console.log(filedata);
    $scope.btnDetail.click();
  }
  // $('#img_files').on('change', function (ev) {
  //   var filedata = Array.from(this.files);
  //   $scope.images = uploadFiles(filedata);
  // });
}

app.controller('singleController', singleController);
function singleController($scope, $http) {
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
  connect_api('GET', apiBase + nameController + $scope.id, null, function (res) {
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

  // Increase or decrease the count
  $scope.changedCount = (index) => {
    if (index === 0) $scope.quantity++;
    else
    {
      if($scope.quantity > 1) $scope.quantity--;
    }
  }

  // Add to cart
  $scope.addCart = () => {
    const customer_id = JSON.parse(sessionStorage.getItem('customer')).id;
    
    $scope.detail = {
      product_id: $scope.item.id,
      quantity: $scope.quantity,
      single_price: $scope.item.price.price_current == 0 ? $scope.item.price.price_origin : $scope.item.price.price_current,
      status: 1,
      size: $scope.item.colors[$scope.colorIndex].sizes[$scope.sizeIndex],
      image: $scope.item.colors[$scope.colorIndex].images[0],
      color: $scope.item.colors[$scope.colorIndex],
    };
    const cart = {
      customer_id,
      detail: $scope.detail
    }

    if (!checkCustomerLogin().username)
    {
      window.location.href = '/login';
    }
    else
    {
      connect_api('POST', apiBase + nameCart, cart, function (res) {
        location.href = "/cart";
        toastr.success(res.data);
      });
    }
  }

  // Pick color in client detail view
  $scope.pickColor = (index) => {
    $scope.colorIndex = index;
    $scope.images = $scope.item.images.filter(
      (image) =>
        image.product_color_id === $scope.item.colors[$scope.colorIndex].id
    );
  };

  $scope.pickSize = (index) => {
    $scope.sizeIndex = index;
  }
}
