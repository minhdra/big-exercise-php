const nameDeliveryAddress = 'delivery_addresses/';
app.controller('profileController', profileController);
function profileController($scope, $http) {
  $scope.itemsPerPage = 10;
  $scope.currentPage = 1;
  $scope.sidebarIndex = 0;
  $scope.cities = [];
  $scope.districts = [];
  $scope.communes = [];
  $scope.status = 0;
  $scope.checkType = 0;
  $scope.typeAddress = 'Private home';
  $scope.serial = 1;
  $scope.indexCount = function (newPageNumber) {
    $scope.serial = newPageNumber * 10 - 9;
  };
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
        },
        (error) => {
          console.log(error);
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
        }
      );
    }
  };
  $scope.customer = {};
  $scope.check = checkCustomerLogin();
  $scope.sidebarItems = [
    {
      id: 0,
      label: 'Orders'
    },
    {
      id: 1,
      label: 'Addresses'
    },
    {
      id: 2,
      label: 'Wishlist'
    },
    {
      id: 3,
      label: 'Logout',
      logout: function () {
        $scope.logout();
      } 
    },
  ]

  $scope.loadData = () => {
    if ($scope.check.id) {
      connect_api(
        'GET',
        apiBase + nameCustomer + $scope.check.id,
        null,
        function (res) {
          $scope.customer = res.data;
          console.log($scope.customer);
          
        }
      );
    } else {
      history.back();
    }
  };

  $scope.logout = () => {
    sessionStorage.removeItem('customer');
    localStorage.removeItem('customer');
    location.href = '/';
  }

  $scope.sidebarClick = (item) => {
    $scope.sidebarIndex = item.id;
    if(item.logout) {item.logout();}
  }

  // show modal update delivery address
  $scope.showUpdateDeliveryAddress = (item) => {
    $('#modal2').addClass('is-visible');
    // Get all cities 
    if (!item) {
      $scope.modalTitle = 'Add delivery address';
      $scope.isCreate = true;
      connect_api('GET', '/assets/hanhchinhvn/tinh_tp.json', null, function (res) {
        $scope.cities = Object.values(res.data);
      });
    }
    else
    {
      $scope.modalTitle = 'Update delivery address';
      $scope.isCreate = false;
      $scope.address_id = item.id;
      connect_api('GET', '/assets/hanhchinhvn/tinh_tp.json', null, function (res) {
        $scope.cities = Object.values(res.data);
        $scope.full_name = item.full_name;
        $scope.phone_number = Number.parseInt(item.phone_number);
        $scope.specific_address = item.specific_address;
        $scope.typeAddress = item.type_address;
        $scope.checkType = item.type_address == $scope.typeAddress ? 0 : 1;
        $scope.status = Number.parseInt(item.status);
        const city = $scope.cities.filter(i => i.name_with_type == item.province)[0];
        $scope.city_code = city?.code;
        $scope.city = city?.name_with_type;
      });
      connect_api('GET', '/assets/hanhchinhvn/quan_huyen.json', null, function (res) {
        $scope.changeCity();
        const district = Object.values(res.data).filter(i => i.name_with_type == item.district)[0];
        $scope.district = district.name_with_type;
        $scope.district_code = district.code;
      });
      connect_api('GET', '/assets/hanhchinhvn/xa_phuong.json', null, function (res) { 
        $scope.changeDistrict();
        const commune = Object.values(res.data).filter(i => i.name_with_type == item.commune)[0];
        $scope.commune = commune.name_with_type;
        $scope.commune_code = district.code;
      });
    }
  };

  // Handle event change city
  $scope.changeCity = () => {
    connect_api('GET', '/assets/hanhchinhvn/quan_huyen.json', null, function (res) {
      $scope.districts = Object.values(res.data).filter(item => item.parent_code === $scope.city_code);
      $scope.city = $scope.cities.filter(item => item.code === $scope.city_code)[0]?.name_with_type; 
    })
  }
  // Handle event change district
  $scope.changeDistrict = () => {
    connect_api('GET', '/assets/hanhchinhvn/xa_phuong.json', null, function (res) {
      $scope.communes = Object.values(res.data).filter(item => item.parent_code === $scope.district_code);
      $scope.district = $scope.districts.filter(item => item.code === $scope.district_code)[0]?.name_with_type; 
    })
  }
  // Get type delivery address
  $scope.getTypeAddress = (ev) => {
    $scope.typeAddress = ev.target.innerText;
  }
  // Insert or update delivery address
  $scope.saveDeliveryAddress = () => {
    // Create model delivery address
    // console.log($scope.status);
    const delivery = {
      customer_id: $scope.customer.id,
      full_name: $scope.full_name,
      phone_number: $scope.phone_number,
      province: $scope.city,
      district: $scope.district,
      commune: $scope.commune,
      specific_address: $scope.specific_address,
      type_address: $scope.typeAddress,
      status: ($scope.status | $scope.status != 0) ? 1 : 0,
    }
    if ($scope.isCreate)
    {
      connect_api('POST', apiBase + nameDeliveryAddress, delivery, function (res) {
        // if ($scope.delivery_address.status === 1)
        //   $scope.delivery_address = res.data;
        $scope.loadData();
        $('#modal2').removeClass('is-visible');
      });
    } else
    {
      connect_api('PUT', apiBase + nameDeliveryAddress + $scope.address_id, delivery, function (res) {
        // if ($scope.delivery_address.status === 1)
        //   $scope.delivery_address = res.data;
        $scope.loadData();
        $('#modal2').removeClass('is-visible');
      })
    }
  }
  // Remove delivery address
  $scope.removeDeliveryAddress = (id) => {
    const ask = "Are you sure you want to remove?";
    if(confirm(ask))
      connect_api('DELETE', apiBase + nameDeliveryAddress + id, null, function (res) {
        toastr.success('Remove success');
        $scope.loadData();
      })
  }
  // Open order details
  $scope.openOrderDetail = (index) => {
    $scope.orderIndex = index;
    $('#detailsModal').addClass('is-visible');
  }
  // Close order details
  $scope.closeModal = () => {
    $('#modal2').removeClass('is-visible');
    $('#detailsModal').removeClass('is-visible');
  }
}
