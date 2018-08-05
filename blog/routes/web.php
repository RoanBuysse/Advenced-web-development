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
                //comment
                Route::post('blog/{id}/comments', 'CommentsController@store')->name('savecomment');

            //category
            Route::get('/categories/create', 'BlogCategoryController@create')->name('createblogCategory');
            Route::post('/categories/store', 'BlogCategoryController@store')->name('saveblogCategory');
            Route::get('/categories/{id}', 'BlogCategoryController@show')->name('showblogCategory');
            Route::get('/categories/{id}/edit', 'BlogCategoryController@edit')->name('editblogCategory');
            Route::patch('/categories/{id}/edit', 'BlogCategoryController@update')->name('updateblogCategory');
            Route::delete('/categories/{id}', 'BlogCategoryController@destroy')->name('deleteblogCategory');

    });