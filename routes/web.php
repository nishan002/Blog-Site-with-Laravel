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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){

    // Post section
    Route::get('/post',[
        'uses'      =>  'PostsController@index',
        'as'        =>  'post.index',
    ]);


    Route::get('/post/create', [
        'uses'  =>  'PostsController@create',
        'as'    =>  'post.create'
    ]);

    Route::post('post/store',[
        'uses'  =>  'PostsController@store',
        'as'    =>  'post.store',
    ]);

    Route::get('post/edit/{id}',[
        'uses'  =>  'PostsController@edit',
        'as'    =>  'post.edit'
    ]);

    Route::get('post/delete/{id}',[
        'uses'  =>  'PostsController@destroy',
        'as'    =>  'post.delete',
    ]);


    Route::get('/post/trash',[
        'uses'      =>  'PostsController@trash',
        'as'        =>  'post.trash',
    ]);

    Route::get('post/kill/{id}',[
        'uses'  =>  'PostsController@kill',
        'as'    =>  'post.kill',
    ]);


    // Category Section
    Route::get('category',[
        'uses'  =>  'CategoriesController@index',
        'as'    =>  'category.index',
    ]);

    Route::get('category/create',[
        'uses'      =>  'CategoriesController@create',
        'as'        =>  'category.create',
    ]);

    Route::post('category/store',[
        'uses'      =>  'CategoriesController@store',
        'as'        =>  'category.store'
    ]);

    Route::get('category/edit/{id}',[
        'uses'      =>  'CategoriesController@edit',
        'as'        =>  'category.edit',
    ]);

    Route::put('category/update/{id}',[
        'uses'      =>  'CategoriesController@update',
        'as'        =>  'category.update',
    ]);

    Route::get('category/delete/{id}',[
        'uses'      =>  'CategoriesController@destroy',
        'as'        =>  'category.delete'
    ]);

});
