const nameController = 'colors/';
const imageController = 'images/';
const sizeController = 'sizes/';
const nameSelf = 'color/';

app.controller('product_colorsController', product_colorsController);
function product_colorsController($scope, $http) {
  $scope.title = 'Product colors';
  $scope.tmpArr = [...Array(20).keys()];
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.filterKey = '0';
  const colorM = $('#color-modal');
  const imageM = $('#image-modal');
  const sizeM = $('#size-modal');
  // $scope.images = [];
  $scope.serial = 1;
  $scope.indexCount = function (newPageNumber) {
    $scope.serial = newPageNumber * 10 - 9;
  };
  $scope.color;
  $scope.image;
  $scope.size;
  $scope.itemImage;
  $scope.itemSize;
  $scope.product_id = Number.parseInt(sessionStorage.getItem('product_id')) || undefined;
  const colorsE = $('#colors');
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
  // Get all colors
  const loadData = () => {
    connect_api('GET', apiBase + nameController, null, function (res) {
      $scope.data = res.data;
      countImages($scope.data);
      // console.log(res.data);
    });
  };
  loadData();

  // Count images
  const countImages = (data) => {
    data.forEach((item) => {
      item.numOfImages = item.images ? item.images.length : 0;
    });
  };

  // Get list products
  connect_api('GET', apiBase + nameSelf + 'getProducts', null, function (res) {
    $scope.products = res.data;
    const all = {
      id: undefined,
      name: 'All',
    };
    $scope.products.unshift(all);
    // console.log(res.data);
  });

  // open the modal in admin
  $scope.openModal = (modal, id) => {
    $scope.id = id;
    $scope.modal = modal;
    if (modal == 'color') {
      // Insert
      if (id == 0) {
        $scope.modalTitle1 = 'Insert a color';
        $scope.color = null;
      } else {
        // Edit
        $scope.modalTitle1 = 'Edit a color';

        connect_api('GET', apiBase + nameController + id, null, function (res) {
          $scope.color = res.data; // item is already
          $scope.color.product_id = $scope.color.product.id + '';
        });
      }
      colorM.modal('show');
    } else if (modal == 'image') {
      // Insert
      if (id == 0) {
        $scope.modalTitle2 = 'Insert a image';
        // $scope.itemImage = null;
      } else {
        // Edit
        $scope.modalTitle2 = 'Edit a image';
        connect_api(
          'GET',
          apiBase + imageController + id,
          null,
          function (res) {
            $scope.image = res.data; // item is already
            // console.log($scope.image);
          }
        );
      }
      imageM.modal('show');
    } else {
      // Insert
      if (id == 0) {
        $scope.modalTitle3 = 'Insert a size';
        $scope.size = null;
      } else {
        // Edit
        $scope.modalTitle3 = 'Edit a size';
        connect_api('GET', apiBase + sizeController + id, null, function (res) {
          $scope.size = res.data; // item is already
        });
      }

      sizeM.modal('show');
    }
  };

  // Save data
  $scope.saveData = () => {
    if ($scope.modal == 'color') {
      // is create
      if ($scope.id == 0) {
        connect_api(
          'POST',
          apiBase + nameController,
          $scope.color,
          function (res) {
            $scope.data = [res.data, ...$scope.data];
            countImages($scope.data);
            colorM.modal('hide');
          }
        );
      } else {
        // is update
        connect_api(
          'PUT',
          apiBase + nameController + $scope.id,
          $scope.color,
          function (res) {
            const index = $scope.data.findIndex((item) => item.id == $scope.id);
            $scope.data.splice(index, 1);
            $scope.data = [res.data, ...$scope.data];
            countImages($scope.data);
            colorM.modal('hide');
          }
        );
      }
    } else if ($scope.modal == 'image') {
      // is create
      if ($scope.id == 0) {
        $scope.itemImage.images = $scope.images;
        console.log($scope.itemImage);
        connect_api(
          'POST',
          apiBase + imageController,
          $scope.itemImage,
          function (res) {
            $scope.itemImage.images = [res.data, ...$scope.itemImage.images];
            imageM.modal('hide');
          }
        );
      } else {
        // is update
        $scope.image.image = $scope.images[0];
        connect_api(
          'PUT',
          apiBase + imageController + $scope.id,
          $scope.image,
          function (res) {
            const index = $scope.itemImage.images.findIndex(
              (item) => item.id == $scope.id
            );
            $scope.itemImage.images.splice(index, 1);
            $scope.itemImage.images = [res.data, ...$scope.itemImage.images];
            imageM.modal('hide');
          }
        );
      }
    } else {
      // is create
      if ($scope.id == 0) {
        $scope.size.product_color_id = $scope.product_color_id;
        // console.log($scope.product_color_id);
        connect_api(
          'POST',
          apiBase + sizeController,
          $scope.size,
          function (res) {
            $scope.itemSize.sizes = [res.data, ...$scope.itemSize.sizes];
            sizeM.modal('hide');
          }
        );
      } else {
        // is update
        connect_api(
          'PUT',
          apiBase + sizeController + $scope.id,
          $scope.size,
          function (res) {
            const index = $scope.itemSize.sizes.findIndex(
              (item) => item.id == $scope.id
            );
            $scope.itemSize.sizes.splice(index, 1);
            $scope.itemSize.sizes = [res.data, ...$scope.itemSize.sizes];
            sizeM.modal('hide');
          }
        );
      }
    }
  };

  // Remove
  $scope.remove = (modal, id) => {
    if (modal == 'color') {
    } else if (modal == 'image') {
      connect_api(
        'DELETE',
        apiBase + imageController + id,
        null,
        function (res) {
          const index = $scope.itemImage.images.findIndex(
            (item) => item.id == id
          );
          $scope.itemImage.images.splice(index, 1);
        }
      );
    } else {
      connect_api(
        'DELETE',
        apiBase + sizeController + id,
        null,
        function (res) {
          const index = $scope.itemSize.sizes.findIndex(
            (item) => item.id == id
          );
          $scope.itemSize.sizes.splice(index, 1);
        }
      );
    }
  };

  // Show details
  $scope.showDetails = (product_color_id, images, sizes) => {
    $scope.product_color_id = product_color_id;
    $scope.itemImage = {
      product_color_id,
      images,
    };
    $scope.itemSize = {
      product_color_id,
      sizes,
    };
  };

  // Filter colors
  $scope.filter = async () => {
    if ($scope.filterKey == 0) loadData();
    else
      $scope.data = $scope.data.filter((item) => item.numOfImages == 0);
  };

  $scope.chooseColor = (color) => {
    if (typeof color === 'object') {
      color = color.map((item) => item.color);
      // console.log(color);
    }

    colorsE.tagging('add', color);
    return color;
  };

  var uploadFiles = function (filedata, type = 'img') {
    var imgtype = filedata.type;

    var postData = new FormData();
    $scope.images = [];
    filedata.forEach((item, index) => {
      $scope.images = [...$scope.images, item.name];
      // console.log($scope.images);
      (function (file) {
        var reader = new FileReader();
        reader.onload = function (ev) {
          $('#list_img_prv' + index)
            .attr('src', ev.target.result)
            .css('width', '150px')
            .css('object-fit', 'cover');
          // console.log($('#list_img_prv' + index));
        };
        reader.readAsDataURL(file);
      })(item);
      postData.append(`file${index}`, item);
      postData.append('type', type);
    });

    $.ajax({
      headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
      async: true,
      type: 'post',
      contentType: false,
      processData: false,
      url: apiBase + 'product/' + 'uploads',
      data: postData,
      success: function (res) {
        console.log('success');
      },
      error: function (res) {
        console.log('loi', res);
      },
    });
  };

  $('#img_files').on('change', function (ev) {
    var filedata = Array.from(this.files);
    uploadFiles(filedata);
  });
}
