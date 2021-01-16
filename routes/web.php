<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Routes for Admin

Route::namespace('Admin')->prefix('/admin')->middleware(['check_user_role:' . \App\Role\UserRole::ROLE_ADMIN])->group(function () {

    //dashboard
    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
    
    //users
    Route::get('/users', 'UserController@index')->name('admin.users.index');
    Route::get('/users/create', 'UserController@create')->name('admin.users.create');
    Route::post('/users', 'UserController@store')->name('admin.users.store');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('admin.users.edit');
    Route::put('/users/{id}', 'UserController@update')->name('admin.users.update');
    Route::delete('/users/{id}', 'UserController@destroy')->name('admin.users.destroy');

});

// Routes for front user
Route::get('/user/dashboard', 'HomeController@index')->name('user.dashboard');