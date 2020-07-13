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

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(["middleware" => ["admin_kontrol","auth"]],function (){
    Route::group(["namespace" => "Admin"],function (){
        Route::get("/site-ayar","AdminController@index");
        Route::put("/site-ayar/guncelle","AdminController@guncelle");
        Route::resource("user","UserController");
        Route::delete("user","UserController@destroy");
        Route::resource("kategori","KategoriController");
        Route::resource("makale","MakaleController");
       /* Route::get("/talep","TalepController@index")->name('talep.update');
        Route::post("/talep/durum-degis","TalepController@durumDegis");*/
    });
});

Route::group(["middleware" => ["yazar_kontrol","auth"]],function (){
    Route::group(["namespace" => "Yazar"],function (){
        Route::resource("makalem","MakaleController");
    });
});

/*Route::get("/yazarlik_talep","YazarTalepController@index");
Route::post("/yazarlik_talep/gönder","YazarTalepController@gonder");*/

Route::get("makaleler/{slug}","MakaleController@index");
Route::get("kategoriler/{slug}","KategorilerController@index");
