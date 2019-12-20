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
    return view('vue');
});

/*
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('send', 'mailController@send');

// Route::get('users', 'Pagination@users');
*/

Route::post('/createpost', 'FilesContoller@upload');
Route::post('/getlist', 'FilesContoller@list');
Route::post('/delete/{file}', 'FilesContoller@delete');
Route::post('/rent/{id}', 'FilesContoller@rent');
Route::post('/unrent/{file}', 'FilesContoller@unrent');

Route::prefix('auth')->group(function(){
    Route::get('init', 'AppController@init');
    Route::post('login','AppController@login');
    Route::post('register','AppController@register');
    Route::post('logout','AppController@logout');
});
Route::prefix('api')->group(function(){
    Route::post('register','AppController@register');
});