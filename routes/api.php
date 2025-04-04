<?php

use App\Http\Controllers\AddVendorController;
use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\ArchitectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HideController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PlayoBannerController;
use App\Http\Controllers\PlayoBookBannerController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\SportLightController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;
use App\Models\OrderDetail;



// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/users', [AuthController::class, 'getAllUsers']);
Route::post('/logout-all-devices', [AuthController::class, 'logoutAllDevices']);

Route::get('/hideuser/{id}', [AuthController::class, 'getUserById']);






Route::get('/user/profile', [AuthController::class, 'getUserProfile']);
Route::post('/user/update', [AuthController::class, 'updateUser']);
Route::put('/update/{id}', [AuthController::class, 'updateHide']);
Route::post('/update/{id}', [AuthController::class, 'updateHide']);

// Product Routes
Route::post('/products', [ProductController::class, 'productstored']);
Route::post('/products/update/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/products/list', [ProductController::class, 'getAllProducts']);
Route::get('/products/list/{id}', [ProductController::class, 'getProductById']);


// Banner Routes
Route::post('/banners', [BannerController::class, 'store']);

// Category Routes
Route::post('/categories', [CategoryController::class, 'categorystore']);
Route::get('/categories/list', [CategoryController::class, 'categorylist']);

// Shipping Routes
Route::post('/shipping', [ShippingController::class, 'store']);
Route::put('/shipping/update', [ShippingController::class, 'update']);
Route::get('/shippings/get', [ShippingController::class, 'index']);
Route::delete('/shipping/{user_id}', [ShippingController::class, 'destroy']);
Route::get('/shipping/get/{user_id}', [ShippingController::class, 'show']);


 // Order API

 Route::post('/order-details', [OrderDetailController::class, 'store']);
 Route::get('/order-details/get', [OrderDetailController::class, 'getAll']);
 Route::put('order-details/{id}', [OrderDetailController::class, 'update']);
 Route::get('/order-details/get/{id}', [OrderDetailController::class, 'getById']);
 Route::get('order-details/user/{userId}', [OrderDetailController::class, 'getByUserId']);
 Route::post('/store-order', [ProductOrderController::class, 'store']);
 Route::put('/order/update/{order_id}', [OrderDetailController::class, 'updateorderId']);
 Route::get('/get/order/{order_id}', [OrderDetailController::class, 'getOrderByOrderId']);



 Route::post('/purchas-details', [PurchaseOrderController::class, 'store']);
 Route::get('/purchas-details/get', [OrderDetailController::class, 'getAll']);
 Route::put('purchas-details/{id}', [OrderDetailController::class, 'update']);
 Route::get('/purchas-details/get/{id}', [OrderDetailController::class, 'getById']);
 Route::get('order-details/user/{userId}', [OrderDetailController::class, 'getByUserId']);
 Route::post('/store-purchas', [ProductOrderController::class, 'store']);
 Route::put('/purchas/update/{order_id}', [OrderDetailController::class, 'updateorderId']);
 Route::get('/get/purchas/{order_id}', [OrderDetailController::class, 'getOrderByOrderId']);




 Route::post('/quote', [QuoteController::class, 'store']);
 Route::get('/quote/get', [QuoteController::class, 'getAll']);
 Route::put('quote/{id}', [QuoteController::class, 'update']);
 Route::get('/quote/get/{id}', [QuoteController::class, 'getById']);
 Route::get('quote/user/{userId}', [QuoteController::class, 'getByUserId']);
 Route::post('/store-quote', [QuoteController::class, 'store']);
 Route::put('/quote/update/{order_id}', [QuoteController::class, 'updateorderId']);
 Route::get('/get/quote/{order_id}', [QuoteController::class, 'getOrderByOrderId']);


 Route::post('/cart-items', [CartItemController::class, 'store']);
 Route::get('/cart-items/get/{user_id}', [CartItemController::class, 'index']);
 Route::delete('/cart-items/{id}', [CartItemController::class, 'destroy']);
 Route::put('/cart-items/{id}', [CartItemController::class, 'update'])->name('cart-items.update');


 Route::post('/purchase-items', [PurchaseController::class, 'store']);
 Route::get('/purchase-items/get/{user_id}', [PurchaseController::class, 'index']);
 Route::delete('/purchase-items/{id}', [PurchaseController::class, 'destroy']);
 Route::put('/purchase-items/{id}', [PurchaseController::class, 'update'])->name('cart-items.update');




 Route::post('super-admin/register', [SuperAdminController::class, 'register']);
 Route::post('super-admin/login', [SuperAdminController::class, 'login']);
 Route::post('super-admin/logout', [SuperAdminController::class, 'logout']);
 Route::get('/super-admins/get', [SuperAdminController::class, 'getAllDetails']);
 Route::post('super-admin/update/{id}', [SuperAdminController::class, 'update']);

 Route::post('/wishlists', [WishlistController::class, 'store']);
 Route::get('/wishlists/get/{user_id}', [WishlistController::class, 'getByUserId']);
 Route::get('/wishlists/get-all', [WishlistController::class, 'getAllWishlists']);
 Route::delete('/wishlists/delete/{product_id}', [WishlistController::class, 'deleteByProductId']);

 Route::post('/playo_banner', [PlayoBannerController::class, 'store']);
 Route::get('/playo_banner/get', [PlayoBannerController::class, 'getImages']);
 Route::post('/playo-banners/{id}', [PlayoBannerController::class, 'update']); 
 Route::delete('/playo-banners/{id}', [PlayoBannerController::class, 'destroy']);

 Route::post('/playo_bookbanner', [PlayoBookBannerController::class, 'store']);
 Route::get('/playo_bookbanner/get', [PlayoBookBannerController::class, 'getImages']);

 Route::post('/sport_light', [SportLightController::class, 'store']);
 Route::get('/sport_light/get', [SportLightController::class, 'getImages']);

 Route::post('/architects', [ArchitectController::class, 'store']);
 Route::get('/architects/get', [ArchitectController::class, 'getAllArchitects']);

 Route::put('/architects/update/{ph_no}', [ArchitectController::class, 'update']);
 Route::put('/architects/update-all', [ArchitectController::class, 'updateAll']);

 Route::post('/profession', [ProfessionController::class, 'store']);
 Route::get('/get/profession', [ProfessionController::class, 'getProfessions']);


 Route::post('/hide', [HideController::class, 'store']); 
 Route::put('/hide/{id}', [HideController::class, 'update']); 


 Route::post('/images/upload', [ImageController::class, 'store']);
 Route::get('/images/get', [ImageController::class, 'index']); // Get Images API
 Route::post('/images/{id}', [ImageController::class, 'update'])->name('images.update');




 Route::get('/vendors', [VendorController::class, 'index']);
 Route::post('/vendors', [VendorController::class, 'store']);
 Route::get('/vendors/{id}', [VendorController::class, 'show']);
 Route::put('/vendors/{id}', [VendorController::class, 'update']);
 Route::delete('/vendors/{id}', [VendorController::class, 'destroy']);



Route::get('/add-vendors', [AddVendorController::class, 'index']);
Route::post('/add-vendors', [AddVendorController::class, 'store']);
Route::get('/add-vendors/{id}', [AddVendorController::class, 'show']);
Route::put('/add-vendors/{id}', [AddVendorController::class, 'update']);
Route::delete('/add-vendors/{id}', [AddVendorController::class, 'destroy']);




// php artisan serve --host=0.0.0.0
