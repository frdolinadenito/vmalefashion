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
Auth::routes();



Route::get('/', 'ProductController@index')->name('index');




Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard','DashboardController@create')->name('dashboard.create');

///////////////////////////////--------//////////////////////
Route::get('/about', function () {return view('about');})->name('about');

Route::get('/registrasi', function () {return view('registrasi');})->name('registrasi');

//Route::get('/checkout', function () {return view('checkout');})->name('checkout');
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::get('/icon', function () {return view('icon');})->name('icon');
Route::get('/payment', function () {return view('payment');})->name('payment');
Route::get('/product', function () {return view('product');})->name('product');
Route::get('/service', function () {return view('service');})->name('service');
Route::get('/shop', function () {return view('shop');})->name('shop');
Route::get('/single', function () {return view('single');})->name('single');
Route::get('/typography', function () {return view('typography');})->name('typography');

///////////////////////////////--------//////////////////////
Route::get('/nota2-{id}', 'NotaController@index2')->name('nota');;
//Route::get('/riwayat2-{iduser}','RiwayatController@index2')->name('riwayat');
//Route::get('/riwayat', function () {return view('riwayat');})->name('riwayat');

//Route::get('/produk', function () {return view('produk');})->name('produk');
Route::get('/produk', 'ProductController@index2')->name('produk');
Route::get('/produk/kaos', 'ProductController@kaos')->name('produk-kaos');
Route::get('/produk/tas', 'ProductController@tas')->name('produk-tas');
Route::get('/produk/sepatu', 'ProductController@sepatu')->name('produk-sepatu');
Route::get('/produk/sweater', 'ProductController@sweater')->name('produk-sweater');
Route::get('/produk/jaket', 'ProductController@jaket')->name('produk-jaket');




Route::middleware('auth')->group (function(){

    Route::get('/LaporanBulanan', 'TransaksiController@Laporan')->name('LaporanBulanan');
    Route::post('/LaporanBulanan','TransaksiController@processForm')->name('prosesform');

    

    Route::get('/LaporanBulanan1', 'TransaksiController@bulanan')->name('laporan.bulanan');
    Route::get('/pendapatanBulanan/{id}', 'TransaksiController@pendapatanBulanan');
    Route::get('/LaporanBulanan/pdf/{id}', 'TransaksiController@Bulanan_pdf')->name('bulanan.pdf');

    Route::get('/LaporanTahunan', 'TransaksiController@Laporan2')->name('LaporanTahunan');
    Route::get('/pendapatanTahunan/{id}', 'TransaksiController@pendapatanTahunan');
    Route::get('/LaporanTahunan/pdf/{id}', 'TransaksiController@Tahunan_pdf')->name('tahunan.pdf');

    Route::get('/page/getprovince', 'OngkirController@getprovince');

//////
Route::get('/hasilRekomendasi', 'RekomendasiController@tampilApriori')->name('tampilApriori');
Route::get('/rekomendasiLama', 'RekomendasiController@rekomendasiLama')->name('rekomendasiLama');
Route::get('/page/getRekomendasi', 'RekomendasiController@getRekomendasi')->name('getRekomendasi');
Route::get('/hapusRekomendasi','RekomendasiController@destroy')->name('rekomendasi.destroy');

Route::get('/cek', 'DetailController@cek');


///
    Route::get('/page/getcity', 'OngkirController@getcity');
    Route::get('/page-checkshipping', 'OngkirController@checkshipping')->name('ongkir');
    Route::post('/page-processShipping', 'OngkirController@processShipping');

    Route::get('/tracking', 'TrackingController@index')->name('jne.tracking');
    Route::post('/tracking','TrackingController@store');
    Route::get('/lacak-{id}', 'TrackingController@lacak')->name('lacak');

    Route::get('/detailBarang/{barangs}','DetailController@index')->name('detailProduk');
    //Route::get('detail/{id}', 'DetailController@addToCart')->name('detail');
    
    Route::get('/cart', 'ProductController@cart');
    Route::get('cart/{id}', 'ProductController@addToCart')->name('cart');
    Route::get('detail/{id}', 'ProductController@addToCart2')->name('cart2');
    Route::patch('update-cart', 'ProductController@update')->name('cart.update');
    Route::delete('remove-from-cart/{id}', 'ProductController@remove')->name('cart.remove');
////////////////////////

    Route::get('/favorit', 'FavoritController@favorit');
    Route::get('favorit/{id}', 'FavoritController@addToFavorit')->name('favorit');
    Route::patch('update-favorit', 'FavoritController@update')->name('favorit.update');
    Route::delete('remove-from-favorit/{id}', 'FavoritController@remove')->name('favorit.remove');
//////////////////
    Route::get('/checkout', 'CheckOutController@index')->name('checkout');
    Route::post('/checkout','CheckOutController@store')->name('checkout.store');
    Route::post('/checkout-pro','CheckOutController@store2');
  // Route::post('checkout','CheckOutController@store2')->name('checkout.store2');

    Route::get('/processCheckOut', 'processCheckoutController@index')->name('proses');
    Route::post('/processCheckOut', 'processCheckoutController@store')->name('proses.store');
 
    Route::get('/riwayat/{iduser}', 'RiwayatController@index')->name('riwayat');
    Route::post('/selesai/{id}', 'RiwayatController@store')->name('riwayat.store');

    Route::get('/pembayaran-{iduser}', 'PembayaranController@create')->name('pembayaran');
    Route::post('/pembayaran-{id}','PembayaranController@store')->name('pembayaran.store');

    Route::get('/nota/{id}', 'NotaController@index')->name('nota');;
    Route::get('/nota2', 'NotaController@index2')->name('nota2');;
    
    Route::get('/nota/pdf/{id}', 'NotaController@nota_pdf')->name('nota.pdf');

    Route::get('/index-transaksi','TransaksiController@index')->name('transaksi.index');
    Route::get('/detailPembelian/{id}','TransaksiController@detailPembelian')->name('detailPembelian');
    Route::get('/detailPembayaran/{id}','TransaksiController@detailPembayaran')->name('detailPembayaran');
    Route::post('/detailPembayaran/{id}','TransaksiController@KonfirmasiPembayaran')->name('konfirmasi.store');
    

    Route::get('/barang','BarangController@index')->name('barang.index');
    Route::get('/barang/create','BarangController@create')->name('barang.create');
    Route::post('/barang/create','BarangController@store')->name('barang.store');
    Route::get('/barang/{barangs}/edit', 'BarangController@edit')->name('barang.edit');
    Route::patch('/barang/{barangs}/edit', 'BarangController@update')->name('barang.update');
    Route::delete('barang/{barangs}/delete','BarangController@destroy')->name('barang.destroy');

    Route::get('/barang/trash', 'BarangController@trash')->name('barang.trash');
    Route::get('/barang/kembalikan/{id}', 'BarangController@kembalikan')->name('barang.kembalikan');
    Route::get('/barang/hapus_permanen/{id}', 'BarangController@hapus_permanen')->name('barang.hapus_permanen');

    Route::get('/kategori','KategoriController@index')->name('kategori.index');
    Route::get('/kategori/create','KategoriController@create')->name('kategori.create');
    Route::post('/kategori/create','KategoriController@store')->name('kategori.store');
    Route::get('/kategori/{kategoris}/edit', 'KategoriController@edit')->name('kategori.edit');
    Route::patch('/kategori/{kategoris}/edit', 'KategoriController@update')->name('kategori.update');
    Route::delete('kategori/{kategoris}/delete','KategoriController@destroy')->name('kategori.destroy');

    Route::get('/kategori/trash', 'KategoriController@trash')->name('kategori.trash');
    Route::get('/kategori/kembalikan/{id}', 'KategoriController@kembalikan')->name('kategori.kembalikan');
    Route::get('/kategori/hapus_permanen/{id}', 'KategoriController@hapus_permanen')->name('kategori.hapus_permanen');

    Route::get('/staf','StafController@index')->name('staf.index');
    Route::get('/staf/create','StafController@create')->name('staf.create');
    Route::post('/staf/create','StafController@store')->name('staf.store');
    Route::get('/staf/{stafs}/edit', 'StafController@edit')->name('staf.edit');
    Route::patch('/staf/{stafs}/edit', 'StafController@update')->name('staf.update');
    Route::delete('staf/{stafs}/delete','StafController@destroy')->name('staf.destroy');

    Route::get('/tampilPegawai','PenggunaController@tampilPegawai_Pemilik')->name('pegawai.index');
    Route::get('/pegawai/create','PenggunaController@createPegawai_Pemilik')->name('pegawai.create');
    Route::post('/pegawai/create','PenggunaController@RegistrasiPegawai')->name('pegawai.store');
    Route::get('/pegawai/{pegawais}/edit', 'PenggunaController@editPegawai_Pemilik')->name('pegawai.edit');
    Route::post('/pegawai/{pegawais}/edit', 'PenggunaController@updatePegawai_Pemilik')->name('pegawai.update');
    Route::delete('pegawai/{pegawais}/delete','PenggunaController@HapusPegawai_Pemilik')->name('pegawai.destroy');
    Route::get('/profil/pegawai', 'PenggunaController@tampilPegawai')->name('profil-pegawai');

    Route::get('/pegawai/trash', 'PenggunaController@trash')->name('pegawai.trash');
    Route::get('/pegawai/kembalikan/{id}', 'PenggunaController@kembalikan')->name('pegawai.kembalikan');
    Route::get('/pegawai/hapus_permanen/{id}', 'PenggunaController@hapus_permanen')->name('pegawai.hapus_permanen');
    

    Route::get('/profil', 'PenggunaController@tampilPelanggan')->name('profil');
    Route::get('/profil/{user}/edit', 'PenggunaController@editPelanggan')->name('profil.edit');
    Route::patch('/profil/{user}/edit', 'PenggunaController@updatePelanggan')->name('profil.update');

    Route::get('/changePassword','HomeController@showChangePasswordForm');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

});
