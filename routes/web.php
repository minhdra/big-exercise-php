<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/shop', function () {
    return view('client.shop');
})->name('shop');

Route::get('/shop/{id}', function ($id) {
    return view('client.single-shop', ['id' => $id]);
})->name('single-shop');

Route::post('/shop?category={category}&keyword={keyword}', function ($category, $keyword) {
    return view('client.shop', ['category' => $category, 'keyword' => $keyword]);
})->name('search');

Route::get('/login', function () {
    return view('client.login');
})->name('login');

Route::get('/my-account', function () {
    return view('client.account');
})->name('my-account');

Route::get('/contact', function () {
    return view('client.contact');
})->name('contact');

Route::get('/about', function () {
    return view('client.about');
})->name('about');

Route::get('/cart', function () {
    return view('client.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('client.checkout');
})->name('checkout');

Route::get('/payment', function () {
    return view('client.payment');
})->name('payment');

Route::get('/tracking', function () {
    return view('client.tracking');
})->name('tracking');
// ---------------------------- Admin ------------------------------------
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/products', function () {
    return view('admin.products');
});

Route::get('/admin/colors', function () {
    return view('admin.colors');
});

Route::get('/admin/sizes', function () {
    return view('admin.sizes');
});

Route::get('/admin/images', function () {
    return view('admin.images');
});

Route::get('/admin/categories', function () {
    return view('admin.categories');
});

Route::get('/admin/brands', function () {
    return view('admin.brands');
});

Route::get('/admin/admins', function () {
    return view('admin.admins');
});

Route::get('/admin/admin_infos', function () {
    return view('admin.admin_infos');
});

Route::get('/admin/carts', function () {
    return view('admin.carts');
});

Route::get('/admin/cart_details', function () {
    return view('admin.cart_details');
});

Route::get('/admin/customers', function () {
    return view('admin.customers');
});

Route::get('/admin/customer_infos', function () {
    return view('admin.customer_infos');
});

Route::get('/admin/delivery_addresses', function () {
    return view('admin.delivery_addresses');
});

Route::get('/admin/discounts', function () {
    return view('admin.discounts');
});

Route::get('/admin/import_bills', function () {
    return view('admin.import_bills');
});

Route::get('/admin/import_bill_details', function () {
    return view('admin.import_bill_details');
});

Route::get('/admin/magazines', function () {
    return view('admin.magazines');
});

Route::get('/admin/orders', function () {
    return view('admin.orders');
});

Route::get('/admin/order_statuses', function () {
    return view('admin.order_statuses');
});

Route::get('/admin/order_details', function () {
    return view('admin.order_details');
});

Route::get('/admin/slides', function () {
    return view('admin.slides');
});

Route::get('/admin/suppliers', function () {
    return view('admin.suppliers');
});






















