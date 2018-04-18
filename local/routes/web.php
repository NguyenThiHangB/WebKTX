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
    return view('auth.login');
});




// Route::group(['middleware' => ['auth','web'],], function () {

	Route::get('index', 'HomeController@index')->name('index');

	Route::get('admin', 'Ktx\AdminsController@index')->name('admin');

	Route::resource('employees', 'Ktx\EmployeesController');

	Route::resource('students', 'Ktx\StudentsController');

	Route::resource('positions', 'Ktx\PositionsController');

	Route::resource('typerooms', 'Ktx\TypeRoomsController');

	Route::resource('rooms', 'Ktx\RoomsController');

	Route::resource('regions', 'Ktx\RegionsController');

	Route::resource('rows', 'Ktx\RowsController');

// });

Auth::routes();

