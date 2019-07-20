<?php
use App\View;
use App\Http\Controllers\HomeController;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Session\Session;

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

Route::get('/','ProductController@show')->name('/');

Auth::routes();
Route::get('/home','HomeController@create')->name('/home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mybookings','BookingsController@index')->name('mybookings');
Route::get('/myprofile','ProfilesController@index')->name('myprofile');
Route::post('/myprofile/update','ProfilesController@update')->name('myprofileupdate');
Route::get('/mywishlist','WishlistsController@index')->name('mywishlist');
Route::get('/mycart','CartsController@index')->name('mycart');
Route::get('/section','ProductController@section')->name('section');
Route::get('/show/{id}','ProductController@showproduct');
Route::get('payment/{id}','PaymentsController@show')->name('payment');
Route::post('confirm/{id}','PaymentsController@confirm')->name('confirm');
Route::get('cancel/{id}','BookingsController@cancel')->name('cancel');
Route::get('cart/{id}','CartsController@add')->name('cart');
Route::get('remove/{id}','CartsController@remove')->name('remove');
Route::get('wishlist/{id}','WishlistsController@add')->name('wishlist');
Route::get('comment/{id}','CommentController@add')->name('comment');
Route::get('search','ProductController@search')->name('search');
Route::get('contactus','HomeController@contactus')->name('contactus');
Route::get('request','Auth/ForgotPasswordController@request')->name('request');



//admin

Route::get('/admin/add','AdminController@add')->middleware('is_admin')->name('add');
Route::post('/admin/store','AdminController@store')->middleware('is_admin')->name('store');
Route::get('/admin','AdminController@admin')->middleware('is_admin')->name('admin');
Route::get('/admin/remove/{id}','AdminController@remove')->middleware('is_admin')->name('remove');
Route::get('/admin/edit/{id}','AdminController@edit')->middleware('is_admin')->name('edit');
Route::get('/admin/update/{id}','AdminController@update')->middleware('is_admin')->name('update');