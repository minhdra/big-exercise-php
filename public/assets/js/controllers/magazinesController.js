const nameMagazine = 'magazines/';
const nameS = 'magazine/';

app.controller('magazinesController', magazinesController);
function magazinesController($scope, $http) {
  $scope.title = 'Magazines';
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.keyword = '';
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
  // Get all magazines
  const loadData = () => {
    connect_api('GET', apiBase + nameMagazine, null, function (res) {
      $scope.data = res.data;
    });
  };
  loadData();

  $scope.options = {
    language: 'en',
    allowedContent: true,
    entities: false
  };

  // open the modal in admin
  $scope.openModal = (id) => {
    $scope.text = {
      textInput : '',
      options: {
        language: 'en',
        allowedContent: true,
        entities: false
      }
    };
    $scope.id = id;
    // Insert
    if (id == 0) {
      $scope.modalTitle = 'Insert a magazine';
      $scope.item = {};
    } else { // Edit
      $scope.modalTitle = 'Edit a magazine';
      $http({
        method: 'GET',
        url: apiBase + nameMagazine + id,
      }).then(
        (res) => {
          $scope.item = res.data; // item is already
          $scope.text.textInput = $scope.item.content;
          // console.log($scope.item);
        },
        (error) => console.log(error)
      );
    }
    $('#large').modal('show');
  };

  // Save data
  $scope.saveData = () => {
    $scope.item.content = $scope.text.textInput;

    // is create
    if ($scope.id == 0)
    {
      connect_api('POST', apiBase + nameMagazine, $scope.item, function (res) {
        $scope.data = [res.data, ...$scope.data];
        $('#large').modal('hide');
      })
    } else
    { // is update
      connect_api('PUT', apiBase + nameMagazine + $scope.id, $scope.item, function (res) {
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
      connect_api('DELETE', apiBase + nameMagazine + id, null, function (res) {
        const index = $scope.data.findIndex(item => item.id == id);
        $scope.data.splice(index, 1);
        showAlert('success');
      })
    }
  }
}
