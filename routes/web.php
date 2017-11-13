<?php

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



/*
|--------------------------------------------------------------------------
| Admin Sectrion Routing Started From Here -------------
|--------------------------------------------------------------------------
*/
Route::get('admin', 'adminController@enterUser');
Route::post('login', 'adminController@entryCheck');
Route::get('change', 'adminController@change');
Route::post('adminChange', 'adminController@adminChange');
//Admmin Check Middleware--------------
Route::group(['middleware' => 'is-admin'], function () {
Route::get('dashboard', 'adminController@dashboard');
Route::get('logout', 'adminController@adminLogout');

//Categories Routing
Route::get('addCategories', 'catController@addCategories');
Route::post('storeCategorie', 'catController@storeCategorie');
Route::get('viewCategorie', 'catController@viewCategorie');
Route::get('delCategorie/{id}', 'catController@delCategorie');
Route::get('editCategorie/{id}', 'catController@editCategorie');
Route::post('updateCategorie', 'catController@updateCategorie');
Route::get('singleCategorie/{id}', 'catController@singleCategorie');

//Product Routing
Route::get('addProduct', 'productController@addProduct');
Route::get('editProduct/{id}', 'productController@editProduct');
Route::post('storeProduct', 'productController@storeProduct');
Route::post('updateProduct', 'productController@updateProduct');
Route::get('viewProduct', 'productController@viewProduct');
Route::get('delProduct/{id}', 'productController@delProduct');

//Setting Routing
Route::get('addSlider', 'settingsController@addSlider');
Route::post('storeSlider', 'settingsController@storeSlider');
Route::get('viewSlider', 'settingsController@viewSlider');
Route::get('delSlider/{id}', 'settingsController@delSlider');
Route::get('general', 'settingsController@general');
Route::post('addGeneral', 'settingsController@addGeneral');
Route::get('about', 'settingsController@addAbout');
Route::post('storeAbout', 'settingsController@storeAbout');

//Customer Management
Route::get('viewCustomer', 'customerController@viewCustomer');
Route::get('singleCustomer/{id}', 'customerController@singleCustomer');
Route::get('delCustomer/{id}', 'customerController@delCustomer');
Route::get('editCustomer/{id}', 'customerController@editCustomer');
Route::post('updateCustomer', 'customerController@updateCustomer');


//Order Management
Route::get('viewOrder', 'orderController@viewOrder');
Route::get('singleOrder/{id}', 'orderController@singleOrder');
Route::get('delOrder/{id}/{shipId}', 'orderController@delOrder');
Route::post('acceptOrder', 'orderController@acceptOrder');
Route::get('cancelOrder/{id}', 'orderController@cancelOrder');
Route::get('delivered', 'orderController@delivered');
Route::get('confirmation/{id}', 'orderController@confirmation');
Route::get('completed/{id}', 'orderController@completed');
Route::get('pdf/{id}', 'orderController@pdf');

//Recieve Product Management
Route::get('viewReceive', 'receiveController@viewReceive');
Route::post('advReceive', 'receiveController@advReceive');
Route::get('addReceive', 'receiveController@addReceive');
Route::get('proByCat', 'receiveController@proByCat');
Route::get('sizeByPro', 'receiveController@sizeByPro');
Route::post('storeReceive', 'receiveController@storeReceive');
Route::get('editReceive/{id}', 'receiveController@editReceive');
Route::post('updateReceive', 'receiveController@updateReceive');

//supplier Management
Route::get('viewSupplier', 'supplierController@viewSupplier');
Route::get('addSupplier', 'supplierController@addSupplier');
Route::post('storeSupplier', 'supplierController@storeSupplier');
Route::get('editSupplier/{id}', 'supplierController@editSupplier');
Route::post('updateSupplier', 'supplierController@updateSupplier');
Route::get('delSupplier/{id}', 'supplierController@delSupplier');

//Report Management
Route::get('report', 'reportController@report');
Route::post('viewReport', 'reportController@viewReport');

//Messenger Management From Admin 
Route::get('messenger', 'messengerController@view');
Route::get('chattingUser', 'messengerController@getUser');
Route::get('getMessege/{id}', 'messengerController@getMessege');
Route::post('sendMessege', 'messengerController@sendMessege');




});

/*
|--------------------------------------------------------------------------
| Front End Sectrion Routing Started From Here -------------
|--------------------------------------------------------------------------
*/
// Home Routers
Route::get('/', 'homeController@home');
// Product Routers
Route::get('/productByCat/{id}','homeController@productByCat');
Route::get('/singleProduct/{id}','homeController@singleProduct');
// Cart Routers
Route::post('addToCart','cartController@addToCart');
Route::get('cart','cartController@cart');
Route::get('delCartRow/{rowId}','cartController@delCartRow');
Route::get('checkout','cartController@checkout');
Route::post('storeCustomer','cartController@storeCustomer');
Route::post('customerLogin','cartController@customerLogin');
Route::get('customerLogout','cartController@customerLogout');
// General Page Routers
Route::get('contact','homeController@contact');
Route::post('cusMsg','customerController@cusMsg');

Route::get('environment/policy', 'homeController@viewEnv');
Route::get('quality/policy', 'homeController@viewQua');
Route::get('interior', 'homeController@interior');
Route::get('offer', 'homeController@offer');
// About Page Routers
Route::get('aboutUs', 'homeController@ViewAboutUs');
Route::get('mission&vission', 'homeController@ViewMisVis');
Route::get('message', 'homeController@viewMessage');

// Orde Page Routers
Route::get('order/complete','cartController@complete');

//Messenger Management From User 
Route::get('getCusSms', 'messengerController@getCusSms');
Route::post('sendUserMessege', 'messengerController@sendUserMessege');
