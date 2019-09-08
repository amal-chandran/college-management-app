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

Route::group([
    'prefix' => 'roles',
], function () {
    Route::get('/', 'RolesController@index')
         ->name('roles.role.index');
    Route::get('/create','RolesController@create')
         ->name('roles.role.create');
    Route::get('/show/{role}','RolesController@show')
         ->name('roles.role.show')->where('id', '[0-9]+');
    Route::get('/{role}/edit','RolesController@edit')
         ->name('roles.role.edit')->where('id', '[0-9]+');
    Route::post('/', 'RolesController@store')
         ->name('roles.role.store');
    Route::put('role/{role}', 'RolesController@update')
         ->name('roles.role.update')->where('id', '[0-9]+');
    Route::delete('/role/{role}','RolesController@destroy')
         ->name('roles.role.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'permissions',
], function () {
    Route::get('/', 'PermissionsController@index')
         ->name('permissions.permission.index');
    Route::get('/create','PermissionsController@create')
         ->name('permissions.permission.create');
    Route::get('/show/{permission}','PermissionsController@show')
         ->name('permissions.permission.show')->where('id', '[0-9]+');
    Route::get('/{permission}/edit','PermissionsController@edit')
         ->name('permissions.permission.edit')->where('id', '[0-9]+');
    Route::post('/', 'PermissionsController@store')
         ->name('permissions.permission.store');
    Route::put('permission/{permission}', 'PermissionsController@update')
         ->name('permissions.permission.update')->where('id', '[0-9]+');
    Route::delete('/permission/{permission}','PermissionsController@destroy')
         ->name('permissions.permission.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'student_classes',
], function () {
    Route::get('/', 'StudentClassesController@index')
         ->name('student_classes.student_class.index');
    Route::get('/create','StudentClassesController@create')
         ->name('student_classes.student_class.create');
    Route::get('/show/{studentClass}','StudentClassesController@show')
         ->name('student_classes.student_class.show')->where('id', '[0-9]+');
    Route::get('/{studentClass}/edit','StudentClassesController@edit')
         ->name('student_classes.student_class.edit')->where('id', '[0-9]+');
    Route::post('/', 'StudentClassesController@store')
         ->name('student_classes.student_class.store');
    Route::put('student_class/{studentClass}', 'StudentClassesController@update')
         ->name('student_classes.student_class.update')->where('id', '[0-9]+');
    Route::delete('/student_class/{studentClass}','StudentClassesController@destroy')
         ->name('student_classes.student_class.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'subjects',
], function () {
    Route::get('/', 'SubjectsController@index')
         ->name('subjects.subject.index');
    Route::get('/create','SubjectsController@create')
         ->name('subjects.subject.create');
    Route::get('/show/{subject}','SubjectsController@show')
         ->name('subjects.subject.show')->where('id', '[0-9]+');
    Route::get('/{subject}/edit','SubjectsController@edit')
         ->name('subjects.subject.edit')->where('id', '[0-9]+');
    Route::post('/', 'SubjectsController@store')
         ->name('subjects.subject.store');
    Route::put('subject/{subject}', 'SubjectsController@update')
         ->name('subjects.subject.update')->where('id', '[0-9]+');
    Route::delete('/subject/{subject}','SubjectsController@destroy')
         ->name('subjects.subject.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'attendances',
], function () {
    Route::get('/', 'AttendancesController@index')
         ->name('attendances.attendance.index');
    Route::get('/create','AttendancesController@create')
         ->name('attendances.attendance.create');
    Route::get('/show/{attendance}','AttendancesController@show')
         ->name('attendances.attendance.show')->where('id', '[0-9]+');
    Route::get('/{attendance}/edit','AttendancesController@edit')
         ->name('attendances.attendance.edit')->where('id', '[0-9]+');
    Route::post('/', 'AttendancesController@store')
         ->name('attendances.attendance.store');
    Route::put('attendance/{attendance}', 'AttendancesController@update')
         ->name('attendances.attendance.update')->where('id', '[0-9]+');
    Route::delete('/attendance/{attendance}','AttendancesController@destroy')
         ->name('attendances.attendance.destroy')->where('id', '[0-9]+');
});
