<?php

use App\Http\Controllers\api\admin_infosController;
use App\Http\Controllers\api\adminsController;
use App\Http\Controllers\api\brandsController;
use App\Http\Controllers\api\cart_detailsController;
use App\Http\Controllers\api\cartsController;
use App\Http\Controllers\api\categoriesController;
use App\Http\Controllers\api\customer_infosController;
use App\Http\Controllers\api\customersController;
use App\Http\Controllers\api\delivery_addressesController;
use App\Http\Controllers\api\discountsController;
use App\Http\Controllers\api\import_bill_detailsController;
use App\Http\Controllers\api\import_billsController;
use App\Http\Controllers\api\magazinesController;
use App\Http\Controllers\api\order_detailsController;
use App\Http\Controllers\api\ordersController;
use App\Http\Controllers\api\productsController;
use App\Http\Controllers\api\product_colorsController;
use App\Http\Controllers\api\product_imagesController;
use App\Http\Controllers\api\product_sizesController;
use App\Http\Controllers\api\slidesController;
use App\Http\Controllers\api\suppliersController;
use App\Http\Controllers\order_statusesController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::resource('products', productsController::class);
    Route::get('product/getNew', [productsController::class, 'getNew']);
    Route::get('product/getSeller', [productsController::class, 'getSeller']);
    Route::post('product/upload', [productsController::class, 'uploadFile'])->name('upload.uploadfile');
    Route::post('product/uploads', [productsController::class, 'uploadFiles'])->name('upload.uploadfile');
    Route::post('products/search', [productsController::class, 'search'])->name('search');
    Route::resource('colors', product_colorsController::class);
    Route::get('color/getProducts', [product_colorsController::class, 'getProducts']);
    Route::resource('images', product_imagesController::class);
    Route::post('images/upload', [product_imagesController::class, 'uploadFile']);
    Route::resource('sizes', product_sizesController::class);
    Route::resource('brands', brandsController::class);
    Route::post('brand/upload', [brandsController::class, 'uploadFile'])->name('upload.uploadfile');
    Route::resource('categories', categoriesController::class);
    Route::resource('orders', ordersController::class);
    Route::post('orders/tracking', [ordersController::class, 'trackingOrder']);
    Route::resource('order_statuses', order_statusesController::class);
    Route::resource('order_details', order_detailsController::class);
    Route::resource('admins', adminsController::class);
    Route::post('admins/login', [adminsController::class, 'login']);
    Route::resource('admin_infos', admin_infosController::class);
    Route::resource('carts', cartsController::class);
    Route::resource('cart_details', cart_detailsController::class);
    Route::resource('customers', customersController::class);
    Route::post('customers/login', [customersController::class, 'login']);
    Route::post('customers/register', [customersController::class, 'register']);
    Route::resource('customer_infos', customer_infosController::class);
    Route::resource('delivery_addresses', delivery_addressesController::class);
    Route::resource('discounts', discountsController::class);
    Route::resource('import_bills', import_billsController::class);
    Route::resource('import_bill_details', import_bill_detailsController::class);
    Route::resource('magazines', magazinesController::class);
    Route::resource('slides', slidesController::class);
    Route::post('slide/upload', [slidesController::class, 'uploadFile']);
    Route::resource('suppliers', suppliersController::class);
});
