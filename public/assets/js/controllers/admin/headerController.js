const nameController = 'admins/';
const nameSelf = 'admin/';

app.controller('headerController', headerController);
function headerController($scope, $http) {
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
  
  $scope.checkLogin = () => {
    const idSession = sessionStorage.getItem('user');
    if (idSession)
    {
      connect_api('GET', apiBase + nameController + idSession, null, function (res) {
        if (res.data.id)
          $scope.data = res.data;
        else
          redirect();
      })
    }
    else
      redirect();
  }

  $scope.logout = () => {
    sessionStorage.removeItem('user');
    redirect();
  }

  const redirect = () => {location.href = '/admin/login';}
}
