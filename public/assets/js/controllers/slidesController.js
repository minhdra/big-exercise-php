const nameSlider = 'slides/';
const nameS = 'slide/';

app.controller('slidesController', slidesController);
function slidesController($scope, $http) {
  $scope.title = 'Slides';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
  $scope.serial = 1;
  $scope.indexCount = function (newPageNumber) {
    $scope.serial = newPageNumber * 10 - 9;
  };
  $scope.item;

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
  // Get all slides
  const loadData = () => {
    connect_api('GET', apiBase + nameSlider, null, function (res) {
      $scope.data = res.data;
    });
  };
  loadData();

  // open the modal in admin
  $scope.openModal = (id) => {
    $scope.id = id;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a slide';
      $scope.item = null;
    } else { // Edit
      $scope.modalTitle = 'Edit a slide';
      $http({
        method: 'GET',
        url: apiBase + nameSlider + id,
      }).then(
        (res) => {
          $scope.item = res.data; // item is already
          $scope.image = $scope.item.image;
          // console.log($scope.item);
        },
        (error) => console.log(error)
      );
    }
    $('#large').modal('show');
  };

  // Save data
  $scope.saveData = () => {
    $scope.item.image = $scope.image;
    // is create
    if ($scope.id == 0)
    {
      connect_api('POST', apiBase + nameSlider, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      })
    } else
    { // is update
      connect_api('PUT', apiBase + nameSlider + $scope.id, $scope.item, function (res) {
        const index = $scope.data.findIndex(item => item.id == $scope.id);
        $scope.data.splice(index, 1);
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      })
    }

  }

  // Remove item
  $scope.remove = (id) => {
    const confirm = 'Are you sure you want to?';
    if (window.confirm(confirm))
    {
      connect_api('DELETE', apiBase + nameSlider + id, null, function (res) {
        const index = $scope.data.findIndex(item => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      })
    }
  }

  // Upload file
  var uploadFile = function (filedata, type = 'img') {
    var imgtype = filedata.type;
    var reader = new FileReader();
    reader.onload = function (ev) {
      $('#img_prv')
        .attr('src', ev.target.result)
        .css('width', '150px')
        .css('object-fit', 'cover');
    };
    reader.readAsDataURL(filedata);
    $scope.image = filedata.name;

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


  $('#img_file_upid').on('change', function (ev) {
    var filedata = this.files[0];
    uploadFile(filedata);
  });
}
