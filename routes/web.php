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
//Route::group( ['middleware' => 'role:customer',['except' => Auth::guest()] ], function()
//{


Route::get('/', 'FrontendController@index')->name('land');
Route::get('/email', 'FrontendController@index1')->name('land1');
Route::get('/terms', 'FrontendController@terms')->name('terms');
Route::post('/contact', 'FrontendController@contact')->name('contact');
Route::get('/payment', 'PaymentController@payment')->name('payment');
Route::post('/payment/add-funds/paypal', 'PaymentController@payWithpaypal')->name('paypalPayment');
Route::get('/payment-status', 'UserTransactionController@paymentStatus')->name('paymentStatus');
Route::POST('/cash-payment', 'UserTransactionController@cashPayment')->name('cashPayment');
//Route::get('/paymentSuccess', 'UserTransactionController@paymentSuccess')->name('paymentSuccess');


//});
Route::post('getFair', 'FrontendController@getFair')->name('getFair');

//Route::any('booking', 'FrontendController@booking')->name('booking');

Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('profile', 'FrontendController@userProfile')->name('userProfile');
    Route::post('change_password', 'UserController@changePassword')->name('changePassword');

    Route::group( ['middleware' => 'role:customer' ], function() {
        Route::any('booking', 'FrontendController@booking')->name('booking');
        Route::POST('bookingStore', 'FrontendController@bookingStore')->name('front.booking.store');
        Route::get('bookingConfirmation/{id}', 'FrontendController@bookingConfirmation')->name('front.booking.confirm');
//        Route::POST('bookingStore', 'PaymentController@payWithpaypal')->name('front.booking.store');
        Route::get('about','FrontendController@myInfo')->name('about');
        Route::post('update_customer', 'UserController@customerUpdate')->name('customer.update');

    });
});


//Route::get('/check', function () {
//    return view('Backend.Booking.index');
//});

Auth::routes();

Route::group( ['middleware' => 'role:admin' ], function()
{
    Route::get('admin/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('admin/cars', 'CarController@index')->name('cars');
    Route::get('admin/cars/create', 'CarController@create')->name('cars.create');
    Route::post('admin/cars/store', 'CarController@store')->name('cars.store');
    Route::get('admin/cars/edit/{id}', 'CarController@edit')->name('cars.edit');
    Route::post('admin/cars/update/{id}', 'CarController@update')->name('cars.update');
    Route::get('admin/cars/delete/{id}', 'CarController@destroy')->name('cars.delete');
    Route::get('admin/cars/show/{id}', 'CarController@show')->name('cars.show');

//    Route::get('admin/roles', 'RoleController@index')->name('roles');
//    Route::get('admin/roles/create', 'RoleController@create')->name('roles.create');
//    Route::post('admin/roles/store', 'RoleController@store')->name('roles.store');
//    Route::get('admin/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
//    Route::post('admin/roles/update/{id}', 'RoleController@update')->name('roles.update');
//    Route::get('admin/roles/delete/{id}', 'RoleController@destroy')->name('roles.delete');
//    Route::get('admin/roles/show/{id}', 'RoleController@show')->name('roles.show');
//
//    Route::get('admin/permissions', 'PermissionController@index')->name('permissions');
//    Route::get('admin/permission/create', 'PermissionController@create')->name('permission.create');
//    Route::post('admin/permission/store', 'PermissionController@store')->name('permission.store');
//    Route::get('admin/permission/edit/{id}', 'PermissionController@edit')->name('permission.edit');
//    Route::post('admin/permission/update/{id}', 'PermissionController@update')->name('permission.update');
//    Route::get('admin/permission/delete/{id}', 'PermissionController@destroy')->name('permission.delete');
//    Route::get('admin/permission/show/{id}', 'PermissionController@show')->name('permission.show');

//
    Route::get('admin/users', 'UserController@index')->name('users');
    Route::get('admin/user/create', 'UserController@create')->name('user.create');
    Route::get('admin/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('admin/user/update/{id}', 'UserController@update')->name('user.update');
    Route::get('admin/user/delete/{id}', 'UserController@destroy')->name('user.delete');


    Route::get('admin/drivers', 'DriverController@index')->name('drivers');
    Route::get('admin/driver/create', 'DriverController@create')->name('driver.create');
    Route::post('admin/driver/store', 'DriverController@store')->name('driver.store');
    Route::get('admin/driver/edit/{id}', 'DriverController@edit')->name('driver.edit');
    Route::post('admin/driver/update/{id}', 'DriverController@update')->name('driver.update');
    Route::get('admin/driver/delete/{id}', 'DriverController@destroy')->name('driver.delete');

    Route::get('admin/customers', 'CustomerController@index')->name('customers');
//Route::get('admin/driver/create', 'DriverController@create')->name('driver.create');

//Route::get('admin/locations', 'LocationController@index')->name('locations');
    Route::get('admin/invoices', 'InvoiceController@index')->name('invoice.select');
    Route::post('admin/invoices/store', 'InvoiceController@store')->name('invoice.store');
    Route::get('admin/bills', 'BillController@index')->name('bills');
    Route::get('admin/bills/{id}', 'BillController@show')->name('bill.show');
    Route::get('admin/bills/generate/{id}', 'BillController@generateBill')->name('bill.generate');
    Route::get('admin/bills/email/{id}', 'BillController@emailBill')->name('bill.email');
    Route::get('admin/bills/collect/{id}', 'BillController@billCollect')->name('bill.collect');


    Route::get('admin/airports', 'AirportController@index')->name('airports');
    Route::get('admin/airports/create', 'AirportController@create')->name('airport.create');
    Route::post('admin/airports/store', 'AirportController@store')->name('airport.store');
    Route::get('admin/airports/edit/{id}', 'AirportController@edit')->name('airport.edit');
    Route::post('admin/airports/update/{id}', 'AirportController@update')->name('airport.update');
    Route::get('admin/airports/delete/{id}', 'AirportController@destroy')->name('airport.delete');


    Route::get('admin/locations', 'LocationController@index')->name('locations');
    Route::get('admin/locations/create', 'LocationController@create')->name('location.create');
    Route::post('admin/locations/store', 'LocationController@store')->name('location.store');
    Route::get('admin/locations/edit/{id}', 'LocationController@edit')->name('location.edit');
    Route::post('admin/locations/update/{id}', 'LocationController@update')->name('location.update');
    Route::get('admin/locations/delete/{id}', 'LocationController@destroy')->name('location.delete');

    Route::get('admin/fairs', 'LocationController@fairs')->name('fairs');

    Route::get('admin/bookings', 'BookingController@index')->name('bookings');
    Route::get('admin/booking/create', 'BookingController@create')->name('booking.create');
    Route::post('admin/booking/store', 'BookingController@store')->name('booking.store');
    Route::get('admin/booking/edit/{id}', 'BookingController@edit')->name('booking.edit');
    Route::post('admin/booking/update/{id}', 'BookingController@update')->name('booking.update');
    Route::get('admin/booking/assign/{id}', 'BookingController@driverAssign')->name('booking.assign');
    Route::post('admin/booking/driver/{id}', 'BookingController@driverAssignUpdate')->name('booking.driver');
    Route::get('admin/booking/confirmation/{id}', 'BookingController@paymentConfirmation')->name('booking.payment');
    Route::get('admin/booking/completion/{id}', 'BookingController@jobCompletion')->name('booking.complete');
    Route::get('admin/booking/delete/{id}', 'BookingController@destroy')->name('booking.delete');


    Route::get('admin/settings', 'SiteSettingsController@index')->name('settings');
    Route::post('admin/settings/update/', 'SiteSettingsController@update')->name('setting.update');
    Route::post('admin/settings/fairRaise/', 'SiteSettingsController@fairRaise')->name('setting.fair');
});

//Route::get('admin/dashboard', 'HomeController@index')->name('dashboard');
//Route::get('admin/cars', 'CarController@index')->name('cars');
//Route::get('admin/cars/create', 'CarController@create')->name('cars.create');
//Route::post('admin/cars/store', 'CarController@store')->name('cars.store');
//Route::get('admin/cars/edit/{id}', 'CarController@edit')->name('cars.edit');
//Route::post('admin/cars/update/{id}', 'CarController@update')->name('cars.update');
//Route::get('admin/cars/delete/{id}', 'CarController@destroy')->name('cars.delete');
//Route::get('admin/cars/show/{id}', 'CarController@show')->name('cars.show');

//Route::get('admin/roles', 'RoleController@index')->name('roles');
//Route::get('admin/roles/create', 'RoleController@create')->name('roles.create');
//Route::post('admin/roles/store', 'RoleController@store')->name('roles.store');
//Route::get('admin/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
//Route::post('admin/roles/update/{id}', 'RoleController@update')->name('roles.update');
//Route::get('admin/roles/delete/{id}', 'RoleController@destroy')->name('roles.delete');
//Route::get('admin/roles/show/{id}', 'RoleController@show')->name('roles.show');
//
//Route::get('admin/permissions', 'PermissionController@index')->name('permissions');
//Route::get('admin/permission/create', 'PermissionController@create')->name('permission.create');
//Route::post('admin/permission/store', 'PermissionController@store')->name('permission.store');
//Route::get('admin/permission/edit/{id}', 'PermissionController@edit')->name('permission.edit');
//Route::post('admin/permission/update/{id}', 'PermissionController@update')->name('permission.update');
//Route::get('admin/permission/delete/{id}', 'PermissionController@destroy')->name('permission.delete');
//Route::get('admin/permission/show/{id}', 'PermissionController@show')->name('permission.show');
//
////
//Route::get('admin/users', 'UserController@index')->name('users');
//Route::get('admin/user/create', 'UserController@create')->name('user.create');
//Route::get('admin/user/edit/{id}', 'UserController@edit')->name('user.edit');
//Route::post('admin/user/update/{id}', 'UserController@update')->name('user.update');
//
//
//Route::get('admin/drivers', 'DriverController@index')->name('drivers');
//Route::get('admin/driver/create', 'DriverController@create')->name('driver.create');
//Route::post('admin/driver/store', 'DriverController@store')->name('driver.store');
//Route::get('admin/driver/edit/{id}', 'DriverController@edit')->name('driver.edit');
//Route::post('admin/driver/update/{id}', 'DriverController@update')->name('driver.update');
//
//Route::get('admin/customers', 'CustomerController@index')->name('customers');
////Route::get('admin/driver/create', 'DriverController@create')->name('driver.create');
//
////Route::get('admin/locations', 'LocationController@index')->name('locations');
//
//
//Route::get('admin/airports', 'AirportController@index')->name('airports');
//Route::get('admin/airports/create', 'AirportController@create')->name('airport.create');
//Route::post('admin/airports/store', 'AirportController@store')->name('airport.store');
//Route::get('admin/airports/edit/{id}', 'AirportController@edit')->name('airport.edit');
//Route::post('admin/airports/update/{id}', 'AirportController@update')->name('airport.update');
//
//Route::get('admin/locations', 'LocationController@index')->name('locations');
//Route::get('admin/locations/create', 'LocationController@create')->name('location.create');
//Route::post('admin/locations/store', 'LocationController@store')->name('location.store');
//Route::get('admin/locations/edit/{id}', 'LocationController@edit')->name('location.edit');
//Route::post('admin/locations/update/{id}', 'LocationController@update')->name('location.update');
//
//Route::get('admin/fairs', 'LocationController@fairs')->name('fairs');
//
//Route::get('admin/bookings', 'BookingController@index')->name('bookings');
//Route::get('admin/booking/create', 'BookingController@create')->name('booking.create');
//Route::post('admin/booking/store', 'BookingController@store')->name('booking.store');
//Route::get('admin/booking/edit/{id}', 'BookingController@edit')->name('booking.edit');
//Route::post('admin/booking/update/{id}', 'BookingController@update')->name('booking.update');
//Route::get('admin/booking/assign/{id}', 'BookingController@driverAssign')->name('booking.assign');
//Route::post('admin/booking/driver/{id}', 'BookingController@driverAssignUpdate')->name('booking.driver');