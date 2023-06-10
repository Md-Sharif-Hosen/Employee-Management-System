<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

///User
Route::group( ['prefix'=>'user','middleware'=>['auth'] ],function(){
Route::get('/create','UserController@create')->name('user.create');
Route::post('/store','UserController@store')->name('user.store');
Route::get('/all','UserController@all')->name('user.all');
Route::get('/view','UserController@view')->name('user.view');
});


//session
Route::get('/session/get','SessionController@getsessiondata');
Route::get('/session/store','SessionController@storesessiondata');
Route::get('/session/destroy','SessionController@destorysessiondata');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function () {
    //Employee Add
    Route::get('employee/add', 'EmployeeController@add')->name('admin.employee.add');
    Route::post('employee/store', 'EmployeeController@store')->name('admin.employee.store');
    Route::get('employee/view', 'EmployeeController@view')->name('admin.employee.view');
    Route::get('employee/edit/{id}', 'EmployeeController@edit')->name('admin.employee.edit');
    Route::post('employee/update', 'EmployeeController@update')->name('admin.employee.update');
    Route::get('employee/delete/{id}', 'EmployeeController@delete')->name('admin.employee.delete');

    ///Employee Attendance
   Route::get('employee/attend','AttendanceController@attend');
   Route::post('employee/attend-submit','AttendanceController@attend_submit');
   Route::get('employee/attendence','AttendanceController@add')->name('admin.attendance.add');
   Route::post('employee/attendence/store','AttendanceController@store')->name('admin.attendance.store');
   Route::get('employee/attendence/view','AttendanceController@view')->name('admin.attendance.view');
   Route::get('employee/attendence/edit/{id}','AttendanceController@edit')->name('admin.attendance.edit');
   Route::post('employee/attendence/update','AttendanceController@Update')->name('admin.attendance.update');
   Route::get('employee/attendence/delete/{id}','AttendanceController@delete')->name('admin.attendance.delete');

});
