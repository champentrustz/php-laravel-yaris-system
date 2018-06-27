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




Route::get('/', function () {
    return redirect('/login');
});
Route::get('/info', function () {
    return view('info');
});

Route::get('/search-member', function () {
    return view('search-member');
});

Route::get('/announce', 'HomeController@announce');


Route::get('/announce-print', 'HomeController@announcePrint');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/checkin-event/{eventID}/{userID}', 'CheckinEventController@checkinEvent');
Route::post('/checkin-event/confirm', 'CheckinEventController@checkinEventConfirm');
Route::post('/search-member/search', 'HomeController@searchMember');
Route::post('/search-member/change-password', 'HomeController@changePassword');


Route::get('/member/product', 'WhiteMemberController@index');
Route::get('/member/event', 'WhiteMemberController@event');
Route::get('/member/profile', 'WhiteMemberController@profile');
Route::get('/member/profile/update-profile', 'WhiteMemberController@updateProfile');
Route::post('/member/order/cart-add', 'WhiteMemberController@cartAdd');
Route::post('/member/order/cart/add-order', 'WhiteMemberController@addOrder');
Route::get('/member/order', 'WhiteMemberController@order');
Route::get('/member/change-password', 'WhiteMemberController@changePassword');
Route::get('/member/order/delete/{order_id}', 'WhiteMemberController@deleteOrder');
Route::post('/member/order/upload-payment', 'WhiteMemberController@uploadPayment');
Route::post('/member/order/view-session', 'WhiteMemberController@orderSession');
Route::post('/member/change-password/change-pass', 'WhiteMemberController@changePass');
Route::get('/member/order/view', function () {
    return view('whitemember-order-view');
});


Route::get('/member/order/cart', function () {
    $user = Auth::user();
    return view('whitemember-order-cart',compact('user'));
});


Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/member', 'AdminController@member');
Route::post('/admin/member/change-code', 'AdminController@memberChangeCode');
Route::get('/admin/confirm-order', 'AdminController@confirmOrder');
Route::get('/admin/confirm-sticker', 'AdminController@confirmSticker');
Route::get('/admin/manufacture-sticker', 'AdminController@manufactureStickerShop');
Route::get('/admin/add-product', 'AdminController@addProduct');
Route::get('/admin/except-number', 'AdminController@exceptNumber');
Route::post('/admin/dashboard/view-order-session', 'AdminController@dashboardOrderSession');
Route::post('/admin/confirm-order/view-order-session', 'AdminController@confirmOrderOrderSession');
Route::post('/admin/confirm-sticker/view-order-session', 'AdminController@confirmStickerOrderSession');
Route::get('/admin/dashboard/order-delete/{order_id}', 'AdminController@dashboardDeleteOrder');
Route::get('/admin/confirm-order/order-delete/{order_id}', 'AdminController@confirmOrderDeleteOrder');
Route::post('/admin/dashboard/upload-payment', 'AdminController@uploadPayment');
Route::post('/admin/add-product/add', 'AdminController@addProductAdd');
Route::post('/admin/except-number/add', 'AdminController@exceptNumberAdd');
Route::post('/admin/confirm-order/lot-sticker', 'AdminController@lotSticker');
Route::post('/admin/manufacture-sticker/finished', 'AdminController@finishedProduction');
Route::get('/admin/manufacture-sticker/delivery/{order_id}', 'AdminController@deliverySticker');
Route::get('/admin/confirm-order/delivery/{order_id}', 'AdminController@deliveryOrder');
Route::post('/admin/confirm-order/manufacture-sticker', 'AdminController@manufactureSticker');
Route::post('/admin/add-order/find-user', 'AdminController@findUser');
Route::post('/admin/add-order/add', 'AdminController@addProductFunction');
Route::get('/admin/add-order', 'AdminController@addOrder');
Route::post('/admin/member/view-user-session', 'AdminController@memberUserSession');
Route::get('/admin/add-order/{code}', function ($code) {
    $user = \App\User::where('code','=', $code)->first();
    return view('admin-add-order',compact('user'));
});


Route::get('/admin/member/user-view', function () {
    return view('admin-member-user-view');
});

Route::get('/admin/dashboard/order-view', function () {
    return view('admin-dashboard-order-view');
});

Route::get('/admin/confirm-order/order-view', function () {
    return view('admin-confirm-order-order-view');
});

Route::get('/admin/confirm-sticker/order-view', function () {
    return view('admin-confirm-sticker-order-view');
});

Route::get('/admin/dashboard/confirm-payment/{order_id}', 'AdminController@dashboardConfirmPayment');
Route::get('/admin/confirm-order/confirm-payment/{order_id}', 'AdminController@confirmOrderConfirmPayment');
Route::get('/admin/confirm-sticker/confirm-payment/{order_id}', 'AdminController@confirmStickerConfirmPayment');

