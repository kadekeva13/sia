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
    // //Halaman Beranda
    route::get('/beranda','BerandaController@index')->name('beranda');
    //Halaman Dashboard
    route::get('/halaman-dashboard', 'BerandaController@halamandashboard')->name('halaman-dashboard');
    //Halaman Profile
    route::get('/halaman-profile', 'UserController@index')->name('halaman-profile');
    route::get('/edit-profile', 'UserController@editprofile')->name('edit-profile');
    //Halaman Pengaturan
    route::get('password', 'PasswordController@edit')->name('password.edit');
    route::patch('password', 'PasswordController@update')->name('password.update');
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
    route::post('/store-penjualan', 'PenjualanController@store')->name('simpan-penjualan');
    route::get('/penjualan/edit/{id}','PenjualanController@edit')->name('edit-penjualan');
    route::patch('/penjualan/{id}','PenjualanController@update');
    route::get('/penjualan/delete/{id}','PenjualanController@destroy');
    //CRUD HALAMAN PEMBELIAN
    route::get('/halaman-pembelian','PembelianController@index')->name('halaman-pembelian');
    route::post('/store-pembelian', 'PembelianController@store')->name('simpan-pembelian');
    route::get('/pembelian/edit/{id}','PembelianController@edit')->name('edit-pembelian');
    route::patch('/pembelian/{id}','PembelianController@update');
    route::get('/pembelian/delete/{id}','PembelianController@destroy');
    //CRUD HALAMAN INVENTORY
    route::get('/halaman-inventory','InventoryController@index')->name('halaman-inventory');
    route::post('/store-inventory', 'InventoryController@store')->name('simpan-inventory');
    route::get('/inventory/edit/{id}','InventoryController@edit')->name('edit-inventory');
    route::patch('/inventory/{id}','InventoryController@update');
    route::get('/inventory/delete/{id}','InventoryController@destroy');
    //CRUD HALAMAN PEMASUKAN
    route::get('/halaman-pemasukan', 'PemasukanController@index')->name('halaman-pemasukan');
    route::get('/create-pemasukan', 'PemasukanController@create')->name('create-pemasukan');
    route::post('/store-pemasukan', 'PemasukanController@store')->name('simpan-pemasukan');
    route::get('/pemasukan/edit/{id}','PemasukanController@edit')->name('edit-pemasukan');
    route::patch('/pemasukan/{id}','PemasukanController@update');
    route::get('/pemasukan/delete/{id}','PemasukanController@destroy');
    //CRUD HALAMAN PENGELUARAN 
    route::get('/halaman-pengeluaran', 'PengeluaranController@index')->name('halaman-pengeluaran');
    route::get('/create-pengeluaran', 'PengeluaranController@create')->name('create-pengeluaran');
    route::post('/store-pengeluaran', 'PengeluaranController@store')->name('simpan-pengeluaran');
    route::get('/pengeluaran/edit/{id}','PengeluaranController@edit')->name('edit-pengeluaran');
    route::patch('/pengeluaran/{id}','PengeluaranController@update');
    route::get('/pengeluaran/delete/{id}','PengeluaranController@destroy');
    //CRUD HALAMAN AKUN 
    route::get('/halaman-akun','AkunController@index')->name('halaman-akun');
    route::post('/store-akun', 'AkunController@store')->name('simpan-akun');
    route::get('/akun/edit/{id}','AkunController@edit')->name('edit-akun');
    route::patch('/akun/{id}','AkunController@update');
    route::get('/akun/delete/{id}','AkunController@destroy');
    //CRUD HALAMAN BUKU BESAR
    route::get('/halaman-bukubesar', 'BukubesarController@index')->name('halaman-bukubesar');
    route::get('/create-bukubesar', 'BukubesarController@create')->name('create-bukubesar');
    route::post('/store-bukubesar', 'BukuBesarController@store')->name('simpan-bukubesar');
    route::get('/bukubesar/edit/{id}','BukuBesarController@edit')->name('edit-bukubesar');
    route::patch('/bukubesar/{id}','BukuBesarController@update');
    route::get('/bukubesar/delete/{id}','BukuBesarController@destroy');
    //LAPORAN
    route::get('/cetak-penjualan','AdminController@laporan_penjualan')->name('cetak-penjualan');
    route::get('/cetak-penjualan-print','AdminController@laporan_penjualan_print')->name('cetak-penjualan-print');
    route::get('/cetak-pembelian','AdminController@laporan_pembelian')->name('cetak-pembelian');
    route::get('/cetak-pembelian-print','AdminController@laporan_pembelian_print')->name('cetak-pembelian-print');
    route::get('/cetak-pemasukan','AdminController@laporan_pemasukan')->name('cetak-pemasukan');
    route::get('/cetak-pemasukan-print','AdminController@laporan_pemasukan_print')->name('cetak-pemasukan-print');
    route::get('/cetak-bukubesar','AdminController@laporan_bukubesar')->name('cetak-bukubesar');
    route::get('/cetak-bukubesar-print','AdminController@laporan_bukubesar_print')->name('cetak-bukubesar-print');

});
Route::group(['middleware' => ['auth', 'ceklevel:admin,pimpinan']], function(){
    route::get('/beranda','BerandaController@index');
    //route::get('/halaman-satu', 'BerandaController@halamansatu')->name('halaman-satu');
    route::get('/halaman-customer', 'CustomerController@index')->name('halaman-customer');
});

Route::get('/register', 'LoginController@getRegister')->name('register')->middleware('guest');
Route::post('/register', 'LoginController@postRegister')->middleware('guest');
Route::get('/lupa-password', 'LoginController@lupapassword')->name('lupa-password');
