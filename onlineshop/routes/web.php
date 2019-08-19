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

// Route::get('/', function () {
//     return view('welcome');
// });

//front end site
Route::get('/', 'homeController@index');





//back-end site

Route::get('/logout','superAdminController@logout');

Route::get('/admin', 'adminController@index');

Route::get('/dashboard', 'adminController@showDashboard');

Route::post('/admin-dashboard', 'adminController@dashboard');



//category route

Route::get('/addCategory', 'categoryController@index');
Route::get('/allCategory', 'categoryController@allCategory');

Route::post('/saveCategory', 'categoryController@saveCategory');

Route::get('/inactiveCategory/{category_id}', 'categoryController@inactiveCategory');

Route::get('/activeCategory/{category_id}', 'categoryController@activeCategory');

Route::get('/editCategory/{category_id}', 'categoryController@editCategory');

Route::post('/updateCategory/{category_id}', 'categoryController@updateCategory');

Route::get('/deleteCategory/{category_id}', 'categoryController@deleteCategory');