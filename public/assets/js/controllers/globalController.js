app.controller('globalController', globalController);
function globalController($rootScope, $location) {
  $rootScope.getClass = function (path) {
    const tmp = $location.absUrl().split('/');
    const name = '/' + tmp[tmp.length - 1];
    return name === path ? 'active' : '';
  };
}
