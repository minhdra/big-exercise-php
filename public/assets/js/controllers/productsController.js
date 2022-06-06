const nameProduct = 'products/';
let nameOtherProduct = 'product/';
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
  };
  loadData();

  // open the modal in admin
  $scope.openModal = (id) => {
    $scope.text = {
      textInput: '',
      options: {
        language: 'en',
        allowedContent: true,
        entities: false,
      },
    };
    $scope.id = id;
    $scope.images = null;
    $scope.sizes = null;
    $scope.color = {};
    $scope.size = {};
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a product';
      $scope.item = {};
    } else {
      // Edit
      $scope.modalTitle = 'Edit a product';
      $http({
        method: 'GET',
        url: apiBase + nameProduct + id,
      }).then(
        (res) => {
          $scope.item = res.data; // item is already
          $scope.item.gender = '' + $scope.item.gender;
          $scope.item.brand_id = '' + $scope.item.brand_id;
          $scope.item.category_id = '' + $scope.item.category_id;
          $scope.item.supplier_id = '' + $scope.item.supplier_id;
          $scope.text.textInput = $scope.item.description;
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
    // $scope.item.colors = $scope.colors;
    $scope.item.description = $scope.text.textInput;
    if ($scope.id == 0) {
      connect_api('POST', apiBase + nameProduct, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      });
    } else {
      // console.log($scope.item);
      // is update
      connect_api(
        'PUT',
        apiBase + nameProduct + $scope.id,
        $scope.item,
        function (res) {
          const index = $scope.data.findIndex((item) => item.id == $scope.id);
          $scope.data.splice(index, 1);
          $scope.data = [res.data, ...$scope.data];
          $('#large').modal('hide');
        }
      );
    }
  };

  // Remove item
  $scope.remove = (id) => {
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      connect_api('DELETE', apiBase + nameProduct + id, null, function (res) {
        const index = $scope.data.findIndex((item) => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      });
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
      $scope.item.colors.forEach((item) => {
        if (item.color === color.color) {
          ok = false;
          toastr.warning('Cannot duplicate color');
          return;
        }
      });
      if (ok) {
        $scope.item.colors = [...$scope.item.colors, color];
        $scope.color = {};
      }
    }
  };

  $scope.openEditColor = (color, index) => {
    // $scope.color_id = color.id;
    $scope.color = {};
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
      $scope.item.colors.forEach((item) => {
        if (item.color === color.color) {
          ok = false;
          toastr.warning('Cannot duplicate color');
          return;
        }
      });
      if (ok) {
        $scope.item.colors[$scope.index] = color;
        $scope.item.color = {};
      }
    }
  };

  $scope.removeColor = (color, index) => {
    const color_id = color.id;
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      $scope.item.colors.splice(index, 1);
      if (color_id) {
        connect_api(
          'DELETE',
          apiBase + nameColor + color_id,
          null,
          function (res) {
            showAlert('success');
          }
        );
      }
    }
  };

  $scope.showDetails = (row, index, ev) => {
    $scope.btnDetail = $(ev.currentTarget);
    $scope.index = index;
    $scope.images = $scope.item.colors[index].images ?? [];
    $scope.sizes = $scope.item.colors[index].sizes ?? [];
    console.log($scope.images);
  };

  // ---------------------------------------------------------------- End colors

  // ---------------------------------------------------------------- Start images

  $scope.removeImage = (image, index) => {
    const image_id = image.id;
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      $scope.images.splice(index, 1);
      $scope.item.colors[$scope.index].images = $scope.images;
      if (image_id) {
        connect_api(
          'DELETE',
          apiBase + nameImage + image_id,
          null,
          function (res) {
            showAlert('success');
          }
        );
      }
    }
  };

  $scope.updateImage = (image, index) => {
    $scope.image_id = image.id;
    $scope.indexImage = index;
    $scope.image = image;
  };

  $scope.chooseImage = (ev) => {
    uploadFile(ev.target.files[0]);
  };

  $scope.updateImageDB = () => {
    connect_api(
      'PUT',
      apiBase + nameImage + $scope.image_id,
      $scope.image,
      function (res) {
        $scope.item.colors[$scope.index].images = $scope.images;
        loadData();
      }
    );
  };

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
        $scope.item.colors[$scope.index].sizes = $scope.sizes;
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
      $scope.item.colors[$scope.index].sizes = $scope.sizes;
      $scope.size = {};
    }
  };

  $scope.removeSize = (size, index) => {
    const size_id = size.id;
    console.log(size_id);
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm)) {
      $scope.sizes.splice(index, 1);
      $scope.item.colors[$scope.index].sizes = $scope.sizes;
      if (size_id) {
        connect_api(
          'DELETE',
          apiBase + nameSize + size_id,
          null,
          function (res) {
            showAlert('success');
          }
        );
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

  // Upload file
  var uploadFile = function (filedata, type = 'img') {
    var imgtype = filedata.type;
    $scope.image.image = filedata.name;
    $scope.images.forEach(function (item, index) {
      if (index === $scope.indexImage) item = $scope.image;
    });
    $scope.item.colors[$scope.index].images = $scope.images;
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
      url: apiBase + nameS + 'upload',
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
    let images = $scope.item.colors[$scope.index].images ?? [];
    filedata.forEach((item, index) => {
      images.push({ image: item.name });
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

    $scope.item.colors[$scope.index].images = images;
    // $scope.images = images;

    $.ajax({
      headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
      async: true,
      type: 'post',
      contentType: false,
      processData: false,
      url: apiBase + nameS + 'uploads',
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

  $scope.chooseImages = (ev) => {
    var filedata = Array.from(ev.target.files);
    uploadFiles(filedata);
    // console.log(filedata);
    $scope.btnDetail.click();
  };
}
