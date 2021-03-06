<?php
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use App\Kategori;

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

Route::prefix('admin')->middleware('role:superadministrator|administrator|user')->group(function(){
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

        //INI ROUTE PELANGGAN
    Route::resource('/pelanggan', 'PelangganController');

        //INI ROUTE SUPPLIER
    Route::resource('/supplier', 'SupplierController');




    Route::prefix('p')->middleware('role:superadministrator|administrator|user')->group(function(){

        //INI ROUTE PERUSAHAAN
        Route::resource('/perusahaan', 'PerusahaanController');

        //INI ROUTE KATEGORI
        Route::resource('/kategori', 'KategoriController');

        //INI ROUTE JENIS
        Route::resource('/jenis', 'JenisController');

    });

    Route::prefix('b')->middleware('role:superadministrator|administrator|user')->group(function(){
    Route::resource('/produk', 'ProdukController');
    Route::resource('/varian', 'VarianController');
    Route::resource('/satuan', 'SatuanController');
    Route::resource('/kubikasi', 'KubikasiController');
    Route::resource('/ned', 'NedController');

    });
    Route::prefix('g')->middleware('role:superadministrator|administrator|user')->group(function(){
        Route::resource('/gudang', 'GudangController');
        Route::resource('/storrage', 'StorrageController');
        Route::resource('/group', 'GroupController');
        Route::resource('/raw', 'RowController');
        Route::resource('/pallete', 'PalleteController');
    });

});
// Route::get('/home', 'HomeController@index')->name('home');
