const nameController = 'admins/';
const nameSelf = 'admin/';

app.controller('loginController', loginController);
function loginController($scope, $http) {
  $scope.title = 'Login';
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
          // showAlert('success');
        },
        (error) => {
          console.log(error);
          // showAlert('error');
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
          // showAlert('error');
        }
      );
    }
  };
  
  $scope.login = () => {
    connect_api('POST', apiBase + nameController + 'login', $scope.item, function (res) {
      if (res.data.id)
      {
        toastr.success('Login successful');
        setTimeout(() => {
          sessionStorage.setItem('user', res.data.id);
          location.href = '/admin';
        }, 1000);
      }
      else
        toastr.error('Username or password incorrect');
    })
  }
}
