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

    // Users Section
    Route::get('user',[
        'uses'  =>  'UsersController@index',
        'as'    =>  'user.index',
    ]);
    Route::get('user/create',[
        'uses'  =>  'UsersController@create',
        'as'    =>  'user.create',
    ]);
    Route::post('user/store',[
        'uses'  =>  'UsersController@store',
        'as'    =>  'user.store',
    ]);
    Route::get('user/edit/{id}',[
        'uses'  =>  'UsersController@edit',
        'as'    =>  'user.edit',
    ]);
    Route::put('user/update/{id}',[
        'uses'  =>  'UsersController@update',
        'as'    =>  'user.update',
    ]);
    Route::get('user/delete/{id}',[
        'uses'  =>  'UsersController@destroy',
        'as'    =>  'user.delete',
    ]);
    Route::get('user/admin/{id}',[
        'uses'  =>  'UsersController@admin',
        'as'    =>  'user.admin',
    ]);
    Route::get('user/not-admin/{id}',[
        'uses'  =>  'UsersController@not_admin',
        'as'    =>  'user.not.admin',
    ]);
    Route::get('user/profile',[
        'uses'  =>  'ProfilesController@index',
        'as'    =>  'user.profile',
    ]);
    Route::post('user/profile/update',[
        'uses'  =>  'ProfilesController@update',
        'as'    =>  'user.profile.update',
    ]);


    // Post section is started
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
    Route::put('post/update/{id}',[
        'uses'  =>  'PostsController@update',
        'as'    =>  'post.update'
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
    Route::get('post/restore/{id}',[
        'uses'  =>  'PostsController@restore',
        'as'    =>  'post.restore'
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


    //Tag Section
    Route::get('tag',[
        'uses'  =>  'TagController@index',
        'as'    =>  'tag.index',
    ]);
    Route::get('tag/create',[
        'uses'  =>  'TagController@create',
        'as'    =>  'tag.create',
    ]);
    Route::post('tag/store',[
        'uses'  =>  'TagController@store',
        'as'    =>  'tag.store',
    ]);
    Route::get('tag/edit/{id}',[
        'uses'  =>  'TagController@edit',
        'as'    =>  'tag.edit',
    ]);
    Route::put('tag/update/{id}',[
        'uses'  =>  'TagController@update',
        'as'    =>  'tag.update',
    ]);
    Route::get('tag/delete/{id}',[
        'uses'  =>  'TagController@destroy',
        'as'    =>  'tag.delete',
    ]);
});
