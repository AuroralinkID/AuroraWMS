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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware('role:superadmin|admin|user')->group(function(){
    Route::get('/', 'AdminController@dashboard');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::resource('/users', 'UsersController');
    Route::post('/users/create', 'UsersController@create');
    Route::get('/users/{id}/edit', 'UsersController@edit');
    Route::get('/users/{id}/detail', 'UsersController@show');
    Route::patch('/users/{id}', 'UsersController@update');
    Route::get('/users/{id}', 'UsersController@destroy');
    Route::resource('/permission', 'PermissionController');
    Route::resource('/roles', 'RolesController');
});
// Route::get('/home', 'HomeController@index')->name('home');
