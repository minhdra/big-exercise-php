const app = angular.module('app', ['angularUtils.directives.dirPagination']);
const apiBase = 'http://127.0.0.1:8000/api/v1/';

setTimeout(() => {
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
}, 2000);

function showAlert(status) {
  if (status === 'success')
  {
    toastr.success('Success! Have fun 😍', 'Successful', {
      progressBar: !0,
    });
  } else
  {
    toastr.error('Have an error 😒', 'Error', {
      progressBar: !0,
    });
  }
}

function convertDate(date) {
  let result;
  if (date) date = new Date(date);
  result =
    date.getFullYear() +
    '-' +
    (date.getMonth() + 1) +
    '-' +
    date.getDate() +
    ' ' +
    date.getHours() +
    ':' +
    date.getMinutes();
  return result;
}
