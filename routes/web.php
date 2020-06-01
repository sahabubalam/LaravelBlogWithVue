<?php

use Illuminate\Support\Facades\Route;

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
//Route::get('/index', 'HomeController@home')->name('index');
//Route::get('/{anypath}','HomeController@index')->where('path','.*');
//Route::get('/category', 'Admin\Category\CategoryController@Category')->name('category');
//Route::post('add/category', 'Admin\Category\CategoryController@AddCategory');
Route::get('get/category', 'Admin\Category\PostController@getCategory');
//post
//Route::get('/post', 'Admin\Post\PostController@Post')->name('post');
//Route::post('add/post', 'Admin\Post\PostController@AddPost');
Route::get('/post', 'Admin\Post\PostController@AllPost');
Route::post('/savepost', 'Admin\Post\PostController@SavePost');
Route::get('/delete/{id}', 'Admin\Post\PostController@DeletePost');
Route::get('/post/{id}', 'Admin\Post\PostController@EditPost');
Route::post('/update-post/{id}', 'Admin\Post\PostController@UpdatePost');

//Category
Route::post('/add-category','Admin\Category\CategoryController@AddCategory');
Route::get('/category','Admin\Category\CategoryController@AllCategory');
Route::get('/category/{id}','Admin\Category\CategoryController@DeleteCategory');
Route::get('/editcategory/{id}','Admin\Category\CategoryController@EditCategory');
Route::post('/update-category/{id}','Admin\Category\CategoryController@UpdateCategory');
