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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
    return view('pengguna.login');
})->name('login');

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin,pimpinan']], function(){
    //Halaman Beranda
    route::get('/beranda','BerandaController@index')->name('beranda');
    //Halaman Dashboard
    route::get('/halaman-dashboard', 'BerandaController@halamandashboard')->name('halaman-dashboard');
    //Halaman Profile
    route::get('/halaman-profile', 'UserController@index')->name('halaman-profile');
    route::get('/edit-profile', 'UserController@editprofile')->name('edit-profile');
    //CRUD HALAMAN CUSTOMER
    route::get('/halaman-customer', 'CustomerController@index')->name('halaman-customer');
    route::get('/create-customer', 'CustomerController@create')->name('create-customer');
    route::post('/store-customer', 'CustomerController@store')->name('simpan-customer');
    route::get('/customer/edit/{id}','CustomerController@edit')->name('edit-customer');
    route::patch('/customer/{id}','CustomerController@update');
    route::get('/customer/delete/{id}','CustomerController@destroy');
    //CRUD HALAMAN SUPPLIER
    route::get('/halaman-supplier', 'SupplierController@index')->name('halaman-supplier');
    route::get('/create-supplier', 'SupplierController@create')->name('create-supplier');
    route::post('/store-supplier', 'SupplierController@store')->name('simpan-supplier');
    route::get('/supplier/edit/{id}','SupplierController@edit')->name('edit-supplier');
    route::patch('/supplier/{id}','SupplierController@update');
    route::get('/supplier/delete/{id}','SupplierController@destroy');
    //CRUD HALAMAN PENJUALAN
    route::get('/halaman-penjualan', 'PenjualanController@index')->name('halaman-penjualan');
    route::get('/create-penjualan', 'PenjualanController@create')->name('create-penjualan');
    route::post('/store-penjualan', 'PenjualanController@store')->name('simpan-penjualan');
    route::get('/penjualan/edit/{id}','PenjualanController@edit')->name('edit-supplier');
    //CRUD HALAMAN PEMBELIAN
    route::get('/halaman-pembelian', 'BerandaController@halamanpembelian')->name('halaman-pembelian');
});
Route::group(['middleware' => ['auth', 'ceklevel:admin,pimpinan']], function(){
    route::get('/beranda','BerandaController@index');
    //route::get('/halaman-satu', 'BerandaController@halamansatu')->name('halaman-satu');
    route::get('/halaman-customer', 'CustomerController@index')->name('halaman-customer');
});

Route::get('/register', 'LoginController@getRegister')->name('register')->middleware('guest');
Route::post('/register', 'LoginController@postRegister')->middleware('guest');
Route::get('/lupa-password', 'LoginController@lupapassword')->name('lupa-password');
