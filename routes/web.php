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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/produit', 'ProduitController@indexProduiut')->name('produit');

Route::get('/about_prod/{id}', 'ProduitController@getPoduit')->name('about_prod');;

Route::get('/add-to-cart/{id}', 'ProduitController@getAddToCart')->name('addToCart');

Route::get('/shopping_cart', 'ProduitController@getShoppingCart')->name('Shopping_cart');

Route::get('/remove_cart/{id}', 'ProduitController@getRemoveToCart')->name('remove_cart');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/comment_prod/{client_id}/{produit_id}', 'commentaireController@postComment')->name('post_comment');

Route::post('/add-to-cart/{produit_id}', 'SupplementController@postAddSupplimentAndProductToCart')->name('AddSupplimentAndProductToCart');

Route::get('/RemoveSupplement/{id}', 'SupplementController@getRemoveSupplement')->name('RemoveSupplement');

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/order-complete', function () {
    return view('order-complete');
});

Route::get('/checkout', 'CheckoutController@index')->name('checkout');