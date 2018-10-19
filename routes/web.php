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

Route::get('/login', 'Authenticate\LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'Authenticate\LoginController@authenticate')->middleware('guest');
Route::post('/logout', 'Authenticate\LoginController@logout')->middleware(['auth']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');
});


Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function() {
    Route::get('/', 'ProfileController@index');
    Route::patch('/', 'ProfileController@profile');
    Route::patch('/auth', 'ProfileController@auth');
});

Route::group(['prefix' => 'farmers', 'middleware' => ['auth']], function() {
    Route::get('/', 'OwnerController@index');
    Route::get('/create', 'OwnerController@create');
    Route::post('/create', 'OwnerController@store');
    Route::get('/{id}/profile', 'OwnerController@show');
    Route::get('/{id}/farm-data', 'FarmerController@show');
    Route::post('/member', 'OwnerRelationsController@store');
    Route::delete('/member/{id}', 'OwnerRelationsController@destroy');
    Route::post('/{id}/animal', 'FarmerController@storeAnimal');
    Route::post('/{id}/tree', 'FarmerController@storeTree');
    Route::get('/{id}/farms', 'FarmController@index');
    Route::get('/{id}/farms/create', 'FarmController@create');
    Route::post('/{id}/farms/create', 'FarmController@store');
    Route::get('/{id}/edit', 'OwnerController@edit');
    Route::patch('/{id}', 'OwnerController@update');
    Route::get('/{id}/machines', 'MachineController@index');
    Route::get('/{id}/machines/create', 'MachineController@create');
    Route::post('/{id}/machines', 'MachineController@store');
});

Route::group(['prefix' => 'farms', 'middleware' => ['auth']], function() {
    Route::get('/{id}', 'FarmController@show');
    Route::get('/{id}/croppings/create', 'CroppingController@create');
    Route::post('/{id}/croppings/create', 'CroppingController@store');
});



Route::group(['prefix' => 'animals', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', 'AnimalController@index');
    Route::post('/', 'AnimalController@store');
});

Route::group(['prefix' => 'trees', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', 'TreeController@index');
    Route::post('/', 'TreeController@store');
});

Route::group(['prefix' => 'crops', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', 'CropController@index');
    Route::post('/', 'CropController@store');
});

Route::group(['prefix' => 'users', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', 'UserController@index');
    Route::get('/create', 'UserController@create');
    Route::post('/create', 'UserController@store');
    Route::get('/{id}/edit', 'UserController@show');
    Route::patch('/{id}/status', 'UserController@status');
    Route::patch('/{id}/profile', 'UserController@profile');
    Route::patch('/{id}/login', 'UserController@login');
});

Route::group(['prefix' => 'users/admin', 'middleware' => ['auth', 'root']], function() {
    Route::get('/', 'UserController@admin');
    Route::get('/{id}/edit', 'UserController@showAdmin');
    Route::patch('/{id}/status', 'UserController@status');
    Route::patch('/{id}/profile', 'UserController@profile');
    Route::patch('/{id}/login', 'UserController@login');
});


Route::group(['prefix' => 'machines'], function() {
    Route::get('/', 'InventoryController@index');
});


Route::group(['prefix' => 'reports', 'middleware' => ['auth']], function() {
    Route::get('/', 'ReportsController@index');

    Route::get('/inventory/count', 'ReportsController@inventoryCount');
    Route::get('/inventory/{code}/machines', 'ReportsController@machines');
    Route::get('/farmers/barangay', 'ReportsController@farmerBarangays');
    Route::get('/farmers/barangay/{brgy}', 'ReportsController@barangayFarmers');
    Route::get('/machines/barangay', 'ReportsController@barangayMachines');
    Route::get('/barangay/{brgy}/machines', 'ReportsController@machineBarangay');

    Route::get('/farmers', 'ReportsController@farmers')->name('reports.farmers');
    Route::get('/farmers/getFarmers', 'ReportsController@getFarmers')->name('reports.farmer.getFarmers');

    Route::get('/inventory', 'ReportsController@inventory')->name('reports.inventory');
    Route::get('/inventory/getInventory', 'ReportsController@getInventory')->name('reports.inventory.getInventory');

});

