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

Route::middleware('auth')->group(function () {

     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

     Route::group([
          'prefix' => 'users',
     ], function () {
          Route::get('/', 'UsersController@index')
               ->name('users.user.index');
          Route::get('/create', 'UsersController@create')
               ->name('users.user.create');
          Route::get('/show/{user}', 'UsersController@show')
               ->name('users.user.show')->where('id', '[0-9]+');
          Route::get('/{user}/edit', 'UsersController@edit')
               ->name('users.user.edit')->where('id', '[0-9]+');
          Route::post('/', 'UsersController@store')
               ->name('users.user.store');
          Route::put('user/{user}', 'UsersController@update')
               ->name('users.user.update')->where('id', '[0-9]+');
          Route::delete('/user/{user}', 'UsersController@destroy')
               ->name('users.user.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'roles',
     ], function () {
          Route::get('/', 'RolesController@index')
               ->name('roles.role.index');
          Route::get('/create', 'RolesController@create')
               ->name('roles.role.create');
          Route::get('/show/{role}', 'RolesController@show')
               ->name('roles.role.show')->where('id', '[0-9]+');
          Route::get('/{role}/edit', 'RolesController@edit')
               ->name('roles.role.edit')->where('id', '[0-9]+');
          Route::post('/', 'RolesController@store')
               ->name('roles.role.store');
          Route::put('role/{role}', 'RolesController@update')
               ->name('roles.role.update')->where('id', '[0-9]+');
          Route::delete('/role/{role}', 'RolesController@destroy')
               ->name('roles.role.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'permissions',
     ], function () {
          Route::get('/', 'PermissionsController@index')
               ->name('permissions.permission.index');
          Route::get('/create', 'PermissionsController@create')
               ->name('permissions.permission.create');
          Route::get('/show/{permission}', 'PermissionsController@show')
               ->name('permissions.permission.show')->where('id', '[0-9]+');
          Route::get('/{permission}/edit', 'PermissionsController@edit')
               ->name('permissions.permission.edit')->where('id', '[0-9]+');
          Route::post('/', 'PermissionsController@store')
               ->name('permissions.permission.store');
          Route::put('permission/{permission}', 'PermissionsController@update')
               ->name('permissions.permission.update')->where('id', '[0-9]+');
          Route::delete('/permission/{permission}', 'PermissionsController@destroy')
               ->name('permissions.permission.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'student_classes',
     ], function () {
          Route::get('/', 'StudentClassesController@index')
               ->name('student_classes.student_class.index');
          Route::get('/create', 'StudentClassesController@create')
               ->name('student_classes.student_class.create');
          Route::get('/show/{studentClass}', 'StudentClassesController@show')
               ->name('student_classes.student_class.show')->where('id', '[0-9]+');
          Route::get('/{studentClass}/edit', 'StudentClassesController@edit')
               ->name('student_classes.student_class.edit')->where('id', '[0-9]+');
          Route::post('/', 'StudentClassesController@store')
               ->name('student_classes.student_class.store');
          Route::put('student_class/{studentClass}', 'StudentClassesController@update')
               ->name('student_classes.student_class.update')->where('id', '[0-9]+');
          Route::delete('/student_class/{studentClass}', 'StudentClassesController@destroy')
               ->name('student_classes.student_class.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'subjects',
     ], function () {
          Route::get('/', 'SubjectsController@index')
               ->name('subjects.subject.index');
          Route::get('/create', 'SubjectsController@create')
               ->name('subjects.subject.create');
          Route::get('/show/{subject}', 'SubjectsController@show')
               ->name('subjects.subject.show')->where('id', '[0-9]+');
          Route::get('/{subject}/edit', 'SubjectsController@edit')
               ->name('subjects.subject.edit')->where('id', '[0-9]+');
          Route::post('/', 'SubjectsController@store')
               ->name('subjects.subject.store');
          Route::put('subject/{subject}', 'SubjectsController@update')
               ->name('subjects.subject.update')->where('id', '[0-9]+');
          Route::delete('/subject/{subject}', 'SubjectsController@destroy')
               ->name('subjects.subject.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'attendances',
     ], function () {
          Route::get('/', 'AttendancesController@index')
               ->name('attendances.attendance.index');
          Route::get('/create', 'AttendancesController@create')
               ->name('attendances.attendance.create');
          Route::get('/show/{attendance}', 'AttendancesController@show')
               ->name('attendances.attendance.show')->where('id', '[0-9]+');

          Route::get('/report/{student_class_id}/subject/{subject_id}', 'AttendancesController@report')
               ->name('attendances.attendance.report')->where('id', '[0-9]+');
          Route::get('/report_class_day/{student_class_id}', 'AttendancesController@report_class_day')
               ->name('attendances.attendance.report_class_day')->where('id', '[0-9]+');
          Route::get('/report_class_complete/{student_class_id}', 'AttendancesController@report_class_complete')
               ->name('attendances.attendance.report_class_complete')->where('id', '[0-9]+');

          Route::get('/{attendance}/edit', 'AttendancesController@edit')
               ->name('attendances.attendance.edit')->where('id', '[0-9]+');
          Route::post('/', 'AttendancesController@store')
               ->name('attendances.attendance.store');
          Route::put('attendance/{attendance}', 'AttendancesController@update')
               ->name('attendances.attendance.update')->where('id', '[0-9]+');
          Route::delete('/attendance/{attendance}', 'AttendancesController@destroy')
               ->name('attendances.attendance.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'attendees',
     ], function () {
          Route::get('/', 'AttendeesController@index')
               ->name('attendees.attendee.index');
          Route::get('/create', 'AttendeesController@create')
               ->name('attendees.attendee.create');
          Route::get('/show/{attendee}', 'AttendeesController@show')
               ->name('attendees.attendee.show')->where('id', '[0-9]+');
          Route::get('/{attendee}/edit', 'AttendeesController@edit')
               ->name('attendees.attendee.edit')->where('id', '[0-9]+');
          Route::post('/', 'AttendeesController@store')
               ->name('attendees.attendee.store');
          Route::post('/storeOrUpdate', 'AttendeesController@storeOrUpdate')
               ->name('attendees.attendee.storeOrUpdate');
          Route::put('attendee/{attendee}', 'AttendeesController@update')
               ->name('attendees.attendee.update')->where('id', '[0-9]+');
          Route::delete('/attendee/{attendee}', 'AttendeesController@destroy')
               ->name('attendees.attendee.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'slots',
     ], function () {
          Route::get('/', 'SlotsController@index')
               ->name('slots.slot.index');
          Route::get('/create', 'SlotsController@create')
               ->name('slots.slot.create');
          Route::get('/show/{slot}', 'SlotsController@show')
               ->name('slots.slot.show')->where('id', '[0-9]+');
          Route::get('/{slot}/edit', 'SlotsController@edit')
               ->name('slots.slot.edit')->where('id', '[0-9]+');
          Route::post('/', 'SlotsController@store')
               ->name('slots.slot.store');
          Route::put('slot/{slot}', 'SlotsController@update')
               ->name('slots.slot.update')->where('id', '[0-9]+');
          Route::delete('/slot/{slot}', 'SlotsController@destroy')
               ->name('slots.slot.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'student_class_users',
     ], function () {
          Route::get('/', 'StudentClassUsersController@index')
               ->name('student_class_users.student_class_user.index');
          Route::get('/manage/{classId}', 'StudentClassUsersController@manage')
               ->name('student_class_users.student_class_user.manage');

          Route::get('/create', 'StudentClassUsersController@create')
               ->name('student_class_users.student_class_user.create');
          Route::get('/show/{studentClassUser}', 'StudentClassUsersController@show')
               ->name('student_class_users.student_class_user.show')->where('id', '[0-9]+');
          Route::get('/{studentClassUser}/edit', 'StudentClassUsersController@edit')
               ->name('student_class_users.student_class_user.edit')->where('id', '[0-9]+');
          Route::post('/', 'StudentClassUsersController@store')
               ->name('student_class_users.student_class_user.store');
          Route::put('student_class_user/{studentClassUser}', 'StudentClassUsersController@update')
               ->name('student_class_users.student_class_user.update')->where('id', '[0-9]+');
          Route::delete('/student_class_user/{studentClassUser}', 'StudentClassUsersController@destroy')
               ->name('student_class_users.student_class_user.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'role_has_permissions',
     ], function () {
          Route::get('/', 'RoleHasPermissionsController@index')
               ->name('role_has_permissions.role_has_permission.index');
          Route::get('/create', 'RoleHasPermissionsController@create')
               ->name('role_has_permissions.role_has_permission.create');
          Route::get('/show/{permission}/{role}', 'RoleHasPermissionsController@show')
               ->name('role_has_permissions.role_has_permission.show')->where('id', '[0-9]+');
          Route::get('/manage/{role}', 'RoleHasPermissionsController@manage')
               ->name('role_has_permissions.role_has_permission.manage')->where('id', '[0-9]+');
          Route::get('/{permission}/{role}/edit', 'RoleHasPermissionsController@edit')
               ->name('role_has_permissions.role_has_permission.edit')->where('id', '[0-9]+');
          Route::post('/', 'RoleHasPermissionsController@store')
               ->name('role_has_permissions.role_has_permission.store');
          Route::put('role_has_permission/{permission}/{role}', 'RoleHasPermissionsController@update')
               ->name('role_has_permissions.role_has_permission.update')->where('id', '[0-9]+');
          Route::delete('/role_has_permission/{permission}/{role}', 'RoleHasPermissionsController@destroy')
               ->name('role_has_permissions.role_has_permission.destroy')->where('id', '[0-9]+');
     });
});
