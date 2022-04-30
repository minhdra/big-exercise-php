const nameController = 'products/';
const nameSelf = 'product/';

app.controller('ProductController', ProductController);
function ProductController($scope, $http) {
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
  $scope.item;
  const colorsE = $('#colors-box');
  colorsE.tagging('add', ' ');
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
      }
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
    connect_api('GET', apiBase + nameController + 'getNew', null, function (res) {
      $scope.dataNew = res.data;
    });
    // Get best sellers products
    connect_api('GET', apiBase + nameController + 'getSeller', null, function (res) {
      $scope.dataSeller = res.data;
    });
  }

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
    $scope.image1 = null;
    $scope.image2 = null;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a product';
      colorsE.tagging('reset'); // reset tag colors
      $scope.item = null;
    } else { // Edit
      $scope.modalTitle = 'Edit a product';
      $http({
        method: 'GET',
        url: apiBase + nameController + id,
      }).then(
        (res) => {
          $scope.item = res.data; // item is already
          $scope.item.colors = $scope.chooseColor($scope.item.color); // add tag colors
          $scope.item.gender = "" + $scope.item.gender; 
          $scope.item.brand_id = "" + $scope.item.brand_id; 
          $scope.item.category_id = "" + $scope.item.category_id; 
          $scope.image1 = "" + $scope.item.image_first; 
          $scope.image2 = "" + $scope.item.image_second; 
        },
        (error) => console.log(error)
      );
    }
    $('#large').modal('show');
  };

  // Save data
  $scope.saveData = () => {
    $scope.item.image_first = $scope.image1 ? $scope.image1 : $scope.item.image_first;
    $scope.item.image_second = $scope.image2 ? $scope.image2 : $scope.item.image_second;
    $scope.item.colors = colorsE.tagging('getTags');
    console.log($scope.item)
    // is create
    if ($scope.id == 0)
    {
      connect_api('POST', apiBase + nameController, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
      })
    } else
    { // is update
      connect_api('PUT', apiBase + nameController + $scope.id, $scope.item, function (res) {
        const index = $scope.data.findIndex(item => item.id == $scope.id);
        $scope.data.splice(index, 1);
        $scope.data = [res.data, ...$scope.data];
      })
    }

    $('#large').modal('hide');
  }

  // Remove item
  $scope.remove = (id) => {
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm))
    {
      connect_api('DELETE', apiBase + nameController + id, null, function (res) {
        const index = $scope.data.findIndex(item => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      })
    }
  }

  // Open colors page
  $scope.openDetailPage = (id) => {
    sessionStorage.setItem('product_id', id);
  }

  // Pick color in client detail view
  $scope.pickColor = (index) => {
    $scope.colorIndex = index;
    $scope.images = $scope.item.image.filter(
      (image) =>
        image.product_color_id === $scope.item.color[$scope.colorIndex].id
    );
  };

  // Choose color tagging
  $scope.chooseColor = (color) => {
    if (typeof(color) === 'object')
    {
      color = color.map(item => item.color);
    }
    
    $('#colors-box').tagging('add', color);
    
    return color;
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
    $scope.images = [];
    filedata.forEach((item, index) => {
      $scope.images = [...$scope.images, item.name];
      console.log($scope.images);
      (function (file) {
        var reader = new FileReader();
        reader.onload = function (ev) {
          $('#list_img_prv' + index)
            .attr('src', ev.target.result)
            .css('width', '150px')
            .css('object-fit', 'cover');
          console.log($('#list_img_prv' + index));
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
      url: apiBase + nameSelf + 'uploads',
      data: postData,
      success: function (res) {
        console.log('success');
      },
      error: function (res) {
        console.log('loi', res);
      },
    });
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
    uploadFiles(filedata);
  });
}
