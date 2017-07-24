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
    //return view('welcome');
    return view('auth.login');
})->name('main');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::post('/login-custom', 'LoginController@login')->name('login.custom');


Route::group(['middleware' => 'auth'], function(){
    /*Route::get('/home', function(){
        return view('home');
    })->name('home');*/

    /*Route::get('/dashboard', function(){
        //$image = \App\Image::find(9);
        //return view('dashboard',compact('image',$image));
        return view('dashboard');
    })->name('dashboard');*/

    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/upload', 'UploadController@index')->name('upload');
    Route::post('/upload-post', 'UploadController@uploadImage')->name('post.upload');
    Route::post('/logout', 'LoginController@getLogout')->name('logout');

    Route::resource('department','departmentController');
    Route::resource('section','sectionController');


    Route::get('ajax', 'AjaxController@index');
    Route::get('geDepartment', 'AjaxController@geDepartment');
});



