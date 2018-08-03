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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
            Route::get('/', function () {
                return view('index');
            });

            Auth::routes();

            Route::get('/home', 'HomeController@index')->name('home');


            // users
            Route::resource('users', 'UserController');

            //blogs
            Route::get('/blog/create', 'BlogController@create')->name('createblog');
            Route::post('/blog/store', 'BlogController@store')->name('saveblog');
            Route::get('/blog/{id}', 'BlogController@show')->name('showblog');
            Route::get('/blog/{id}/edit', 'BlogController@edit')->name('editblog');
            Route::patch('/blog/{id}/edit', 'BlogController@update')->name('updateblog');
            Route::delete('/blog/{id}', 'BlogController@destroy')->name('deleteblog');

            //category
            Route::resource('categories', 'BlogCategoryController' );
            Route::get('categories/{id}', ['as' => 'Category.show', 'uses' => 'BlogCategoryController@show']);
    });