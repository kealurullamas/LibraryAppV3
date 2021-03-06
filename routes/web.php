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
    return view('welcome');
});

Route::get('/','PagesController@index');
Route::get('/index','PagesController@index')->name('index');
Route::get('/about','PagesController@about')->name('about');
Route::get('/contact','PagesController@contact')->name('contact');
Route::get('/faq','PagesController@faqs')->name('faq');
Route::get('/book','PagesController@book')->name('book');
Route::get('/book/show/{id}','PagesController@bookShow')->name('bookShow');
Route::post('books/search','PagesController@bookSearch');
Route::resource('/books','BooksController');
Route::get('book/booklog','BooksController@bookLog')->name('booklog');
Auth::routes();

Route::post('BookRequest/findAndStore','BookRequestsController@findAndStore');
Route::resource('BookRequest','BookRequestsController');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

route::post('/notification/get','NotificationController@get')->name('notify');
route::post('/notification/read','NotificationController@read')->name('read');
route::get('/notification/readAll','NotificationController@all')->name('all');

Route::get('/admin_view','AdminController@admin')->name('admin_view');
Route::get('admin/bookaccepts','AdminController@bookaccepts')->name('accepts');

Route::resource('BookAccepts','BookAcceptsController');

Route::post('users/logout','Auth\LoginController@userLogout')->name('users.logout');
Route::get('admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::post('admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');
Route::resource('/admin','AdminController');


Route::resource('BookMonitoring','BookMonitoringController');
Route::get('NotifyDue/{id}','BookMonitoringController@notifyDue')->name('notify');
Route::get('/returns/{id}','BookMonitoringController@returns')->name('return');
Route::post('/BookMonitoring/Search','BookMonitoringController@search');

Route::get('/bookGetByClassi/{classification}','PagesController@showByClassi')->name('getByClassi');

Route::post('/UserRequest','RequestsController@store')->name('userReq');
