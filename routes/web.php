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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/articledetails', function () {
    return view('contact');
});

Route::get('/article', 'MessagesController@getMessages');

Route::get('/categories', 'MessagesController@getCategories');

Route::post('/articledetails/submit', 'MessagesController@submit');

Route::get('/login', 'LoginController@index');

Route::post('/checklogin', 'LoginController@checklogin');
Route::get('/logout', 'LoginController@logout');

Route::get('/upload', 'UploadController@uploadForm');
Route::post('/upload', 'UploadController@uploadSubmit');

Route::resource('showarticle', 'PostController');
Route::resource('showusers', 'UserController');

Route::get('qr-code', function () {
    return QrCode::size(500)->generate(url()->current());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/showusers', 'AllusersController@getData');