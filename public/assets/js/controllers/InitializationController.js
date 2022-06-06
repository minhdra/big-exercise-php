const app = angular.module('app', ['angularUtils.directives.dirPagination', 'ckeditor']);
const port = '8000';
const apiBase = `http://127.0.0.1:${port}/api/v1/`;

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

function checkCustomerLogin() {
  const request = JSON.parse(sessionStorage.getItem('customer')) || JSON.parse(localStorage.getItem('customer')) || {};

  return request;
}

async function getCities() {
  let data = [];
  await $.ajax({
    url: '/assets/hanhchinhvn/tinh_tp.json',
    context: document.body
  }).done(function (res) {
    data = res;
  });
  return data;
}

async function getDistricts() {
  let data = [];
  await $.ajax({
    url: '/assets/hanhchinhvn/quan_huyen.json',
    context: document.body
  }).done(function (res) {
    data = res;
  });
  return data;
}

async function getCommunes() {
  let data = [];
  await $.ajax({
    url: '/assets/hanhchinhvn/xa_huyen.json',
    context: document.body
  }).done(function (res) {
    data = res;
  });
  return data;
}
