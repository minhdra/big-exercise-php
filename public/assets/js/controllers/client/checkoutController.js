const nameCustomer = 'customers/';
const nameCustomerInfo = 'customer_infos/';
const nameDeliveryAddress = 'delivery_addresses/';
const nameOrder = 'orders/';

app.controller('checkoutController', checkoutController);
function checkoutController($rootScope, $scope, $http) {
  $scope.customer = checkCustomerLogin() || {};
  $scope.itemAddress = {};
  $scope.cities = [];
  $scope.districts = [];
  $scope.communes = [];
  $scope.typeAddress = 'Private home';
  $scope.status = 0;
  $scope.checkType = 0;
  $scope.order;
  // Check login when init

  // Define connect api
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
  
  // Get customer
  $scope.loadData = () => {
    if ($scope.customer.username)
    {
      connect_api('GET', apiBase + nameCustomer + $scope.customer.id, null, function (res) {
        $scope.customer = res.data;
        $scope.countTotal();
        // console.log($scope.customer);
        if ($scope.customer.cart_details.length === 0) location.href = '/shop';
        if ($scope.customer.delivery_addresses.length > 0)
        {
          $scope.delivery_address = $scope.customer.delivery_addresses.filter(item => item.status === 1)[0];
        }
      })
    }
  }
  $scope.loadData();

  // Count total
  $scope.countTotal = () => {
    $scope.total = 0;
    $scope.total = $scope.customer.cart_details.reduce(
      (prev, cur) => prev + cur.single_price * cur.quantity,
      $scope.total
    );
  };

  // Update info
  $scope.updateInfo = (info) => {
    info.customer_id = $scope.customer.id;
    if (info.id)
    {
      connect_api('PUT', apiBase + nameCustomerInfo + info.id, info, function (res) {
        
      });
    }
    else
    {
      connect_api('POST', apiBase + nameCustomerInfo, info, function (res) {
        
      });
    }
  }

  // Show modal delivery address
  $scope.showDeliveryAddresses = () => {
    $('#modal2').removeClass('is-visible');
    $('#modal1').addClass('is-visible');
  }

  // show modal update delivery address
  $scope.showUpdateDeliveryAddress = (item) => {
    $('#modal1').removeClass('is-visible');
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
    const delivery = {
      customer_id: $scope.customer.id,
      full_name: $scope.full_name,
      phone_number: $scope.phone_number,
      province: $scope.city,
      district: $scope.district,
      commune: $scope.commune,
      specific_address: $scope.specific_address,
      type_address: $scope.typeAddress,
      status: $scope.status ? 1 : 0,
    }
    if ($scope.isCreate)
    {
      connect_api('POST', apiBase + nameDeliveryAddress, delivery, function (res) {
        if ($scope.delivery_address.status === 1)
          $scope.delivery_address = res.data;
        $scope.loadData();
        $('#modal2').removeClass('is-visible');
      });
    } else
    {
      connect_api('PUT', apiBase + nameDeliveryAddress + $scope.address_id, delivery, function (res) {
        if ($scope.delivery_address.status === 1)
          $scope.delivery_address = res.data;
        $scope.loadData();
        $('#modal2').removeClass('is-visible');
      })
    }
  }

  // Change default delivery
  $scope.changeDefault = (item) => {
    item.status = 1;
    connect_api('PUT', apiBase + nameDeliveryAddress + item.id, item, function (res) {
      $scope.loadData();
    })
  }

  // Close modal
  $scope.closeModal = () => {
    $('#modal2').removeClass('is-visible');
  }

  // Create order
  $scope.payment = () => {
    const delivery_address = [$scope.delivery_address.full_name, $scope.delivery_address.phone_number].join(', ') + ' - ' + [$scope.delivery_address.specific_address, $scope.delivery_address.commune, $scope.delivery_address.district, $scope.delivery_address.province].join(', ');
    const order = {
      delivery_address,
      customer_id: $scope.customer.id,
      total: $scope.total,
      flag: 1,
      details: $scope.customer.cart_details,
    }

    connect_api('POST', apiBase + nameOrder, order, function (res) {
      $scope.order = res.data;

      connect_api('DELETE', apiBase + 'carts/' + $scope.customer.cart.id, null, function () {
      })
    });
  }
}