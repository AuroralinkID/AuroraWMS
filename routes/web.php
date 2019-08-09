<?php
// use Illuminate\Routing\Route;
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
    return view('home');
});

Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware('role:superadmin|admin|user')->group(function(){
    Route::get('/', 'AdminController@dashboard');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    //INI ROUTE USER
    Route::resource('/users', 'UsersController');

    //INI ROUTE PERMISSION
    Route::resource('/permission', 'PermissionController');

    //INI ROUTE ROLE
    Route::resource('/roles', 'RolesController');
    Route::get('/roles/{id}', 'RolesController@destroy');
    Route::post('/roles/{id}', 'RolesController@destroy');
});
// Route::get('/home', 'HomeController@index')->name('home');
