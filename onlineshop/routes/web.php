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

Route::get('/', 'homeController@jewelry');

Route::get('/', 'homeController@menFashion');

Route::get('/', 'homeController@phoneAndComputer');

Route::get('/productDetails/{product_id}', 'homeController@productDetails');


//cart routes are here

Route::post('/addCart', 'cartController@addCart');

Route::get('/showCart', 'cartController@showCart');


Route::get('/deleteCart/{rowId}','cartController@deleteCart');

Route::post('/updateCart', 'cartController@updateCart');

//checkout routes are here
Route::get('/loginCheck','checkoutController@loginCheck');


// customer login routes are here

Route::post('/customerRegistration','checkoutController@customerRegistration');

Route::get('/checkout','checkoutController@checkout');



Route::post('/customerLogin','checkoutController@customerLogin');

Route::get('/customerLogout','checkoutController@customerLogout');



//shipping routes are here

Route::post('/saveShippingDetails','checkoutController@saveShippingDetails');



//payment routes are here

Route::get('/payment','checkoutController@payment');

Route::post('/placeOrder','checkoutController@placeOrder');


//show product by category
Route::get('/productByCategory/{category_id}', 'homeController@showProductByCategory');





//back-end site

Route::get('/logout','superAdminController@logout');

Route::get('/admin', 'adminController@index');

Route::get('/dashboard', 'superAdminController@index');

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


//product routes are here

Route::get('/addProduct', 'productController@index');

Route::post('/saveProduct', 'productController@saveProduct');

Route::get('/allProduct', 'productController@allProduct');

Route::get('/inactiveProduct/{product_id}', 'productController@inactiveProduct');
Route::get('/activeProduct/{product_id}', 'productController@activeProduct');
Route::get('/deleteProduct/{product_id}', 'productController@deleteProduct');

Route::get('/editProduct/{product_id}', 'productController@editProduct');

Route::post('/updateProduct/{product_id}', 'productController@updateProduct');





//Slider routes are here

Route::get('/addSlider', 'sliderController@index');

Route::post('/saveSlider', 'sliderController@saveSlider');

Route::get('/allSlider', 'sliderController@allSlider');


Route::get('/inactiveSlider/{slider_id}', 'sliderController@inactiveSlider');

Route::get('/activeSlider/{slider_id}', 'sliderController@activeSlider');

Route::get('/deleteSlider/{slider_id}', 'sliderController@deleteSlider');


// order routes are here

Route::get('/manageOrder', 'manageOrderController@manageOrder');





