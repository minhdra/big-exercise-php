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
      $scope.colors = res.data.colors;
      $scope.suppliers = res.data.suppliers;
      $scope.totalItems = $scope.data.length;

      $scope.categories.unshift(all);
      $scope.brands.unshift(all);
      $scope.colors.unshift(all);
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
    } else {
      // Edit
      $scope.modalTitle = 'Edit a product';
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
    if ($scope.id == 0) {
      $scope.item.colors = $scope.colors;
      console.log($scope.item);
      // connect_api(
      //   'POST',
      //   apiBase + nameController,
      //   $scope.item,
      //   function (res) {
      //     $scope.data = [res.data, ...$scope.data];
      //   }
      // );
    } else {
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

  $scope.removeColor = (index) => {
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      $scope.colors.splice(index, 1);
    }
  };

  $scope.showDetails = (row, index) => {
    $scope.index = index;
    $scope.images = $scope.colors[index].images ?? [];
  }

  // ---------------------------------------------------------------- End colors

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
  var uploadFile = function (filedata, number, type = 'img') {
    var imgtype = filedata.type;
    var reader = new FileReader();
    reader.onload = function (ev) {
      $('#img_prv' + number)
        .attr('src', ev.target.result)
        .css('width', '150px')
        .css('object-fit', 'cover');
    };
    reader.readAsDataURL(filedata);
    $scope['image' + number] = filedata.name;

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
    let images = [];
    filedata.forEach((item, index) => {
      images = [...images, item.name];
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

    // $scope.colors[$scope.index].images = images;
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

  $('#img_file1_upid').on('change', function (ev) {
    var filedata = this.files[0];
    uploadFile(filedata, 1);
  });
  $('#img_file2_upid').on('change', function (ev) {
    var filedata = this.files[0];
    uploadFile(filedata, 2);
  });
  $('#img_files').on('change', function (ev) {
    var filedata = Array.from(this.files);
      $scope.images = uploadFiles(filedata);
  });
}
