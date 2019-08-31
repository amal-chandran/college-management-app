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
    return view('index');
})->name("index");

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::group([
    'prefix' => 'users',
], function () {
    Route::get('/', 'UsersController@index')
         ->name('users.user.index');
    Route::get('/create','UsersController@create')
         ->name('users.user.create');
    Route::get('/show/{user}','UsersController@show')
         ->name('users.user.show')->where('id', '[0-9]+');
    Route::get('/{user}/edit','UsersController@edit')
         ->name('users.user.edit')->where('id', '[0-9]+');
    Route::post('/', 'UsersController@store')
         ->name('users.user.store');
    Route::put('user/{user}', 'UsersController@update')
         ->name('users.user.update')->where('id', '[0-9]+');
    Route::delete('/user/{user}','UsersController@destroy')
         ->name('users.user.destroy')->where('id', '[0-9]+');
});
