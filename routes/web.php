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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group( ['prefix'=>'admin' , 'middleware' => ['auth'],'namespace'=>'Admin'   ] ,function(){
    Route::get('/employee/add','EmployeeController@add')->name('admin.employee.add');
    Route::post('/employee/store','EmployeeController@store')->name('admin.employee.store');
    Route::get('/employee/view','EmployeeController@view')->name('admin.employee.view');
    Route::get('/employee/edit{id}','EmployeeController@edit')->name('admin.employee.edit');
    Route::post('/employee/update','EmployeeController@update')->name('admin.employee.update');
    Route::get('/employee/delete{id}','EmployeeController@delete')->name('admin.employee.delete');

});

