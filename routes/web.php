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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/article/create', [
        'uses' => 'ArticlesController@create',
        'as' => 'article.create'
    ]);
    
    Route::post('/article/store', [
        'uses' => 'ArticlesController@store',
        'as' => 'article.store'
    ]);

    Route::get('/articles', [
        'uses' => 'ArticlesController@index',
        'as' => 'articles'
    ]);

    Route::get('/article/delete/{id}', [
        'uses' => 'ArticlesController@destroy',
        'as' => 'article.delete'
    ]);

    Route::get('/article/edit/{id}', [
        'uses' => 'ArticlesController@edit',
        'as' => 'article.edit'
    ]);

    Route::post('/article/update/{id}', [
        'uses' => 'ArticlesController@update',
        'as' => 'article.update'
    ]);

    Route::get('/article/show/{id}', [
        'uses' => 'ArticlesController@show',
        'as' => 'article.show'
    ]);


