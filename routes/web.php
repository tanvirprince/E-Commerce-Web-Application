<?php

Route::get('/',[
    'uses' => 'BigStoreController@index',
    'as' => '/'
]);

Route::get('/home',[
    'uses' => 'BigStoreController@home',
    'as' => 'home'
    ]);

Route::get('/category-product/{id}',[
    'uses' => 'BigStoreController@categoryProduct',
    'as' => 'category-product'
]);

// product-details view front-end

Route::get('/product-details/{id}',[
    'uses' => 'BigStoreController@productDetails',
    'as' => 'product-details'
]);
// add-to-card

Route::post('/add-to-cart',[
    'uses' => 'CartController@addToCart',
    'as' => 'add-to-cart'
]);
//show-cart

Route::get('/show-cart',[
    'uses' => 'CartController@showCart',
    'as' => 'show-cart'
]);

//delete-cart-product
Route::get('/delete-cart-product/{id}',[
    'uses' => 'CartController@deleteCart',
    'as' => 'delete-cart-product'
]);
//update-cart
Route::post('/update-cart',[
    'uses' => 'CartController@updateCart',
    'as' => 'update-cart'
]);

Route::get('/checkout',[
    'uses' => 'CheckoutController@index',
    'as' => 'checkout'
]);

//new-customer
Route::post('/new-customer',[
    'uses' => 'CheckoutController@saveCustomerInfo',
    'as' => 'new-customer'
]);
//show-shipping

Route::get('/show-shipping',[
    'uses' => 'CheckoutController@showShipping',
    'as' => 'show-shipping',
    'middleware' => 'middle'
]);

// new-shipping

Route::post('/new-shipping',[
    'uses' => 'CheckoutController@saveShippingInfo',
    'as' => 'new-shipping'
]);
//show-payment
Route::get('/show-payment',[
    'uses' => 'CheckoutController@showPaymentInfo',
    'as' => 'show-payment',
    'middleware' => 'middle'
]);

// new-order
Route::post('/new-order',[
    'uses' => 'CheckoutController@saveOrderInfo',
    'as' => 'new-order'
]);

// complete order

Route::get('/complete-order',[
    'uses' => 'CheckoutController@completeOrder',
    'as' => 'complete-order'
]);
// customer-logout

Route::get('/customer-logout',[
    'uses' => 'CheckoutController@customerLogout',
    'as' => 'customer-logout'
]);

// customer-login
Route::post('/customer-login',[
    'uses' => 'CheckoutController@customerLogin',
    'as' => 'customer-login'
]);








Route::get('/category/add', [
    'uses'  =>  'CategoryController@index',
    'as'    =>  'add-category'
]);



Route::get('/personal',[
    'uses' => 'BigStoreController@hairCare',
    'as' => 'hair-care'
]);

Route::get('natural-cream',[
    'uses' => 'BigStoreController@naturalCream',
    'as' => 'natural-cream'

]);


Route::get('/category/add', [
    'uses'  =>  'CategoryController@index',
    'as'    =>  'add-category'
]);

Route::post('/category/save', [
    'uses'  =>  'CategoryController@saveCategoryInfo',
    'as'    =>  'new-category'
]);

Route::get('/category/manage-category', [
    'uses'  =>  'CategoryController@manageCategory',
    'as'    =>  'manage-category'
]);

Route::get('/category/unpublished/{id}',[
    'uses' => 'CategoryController@unpublishedCategory',
    'as' => 'unpublished-category'
]);
Route::get('/category/published/{id}',[
    'uses' => 'CategoryController@publishedCategory',
    'as' => 'published-category'
]);

Route::get('/category/edit-category/{id}',[
    'uses' => 'CategoryController@editCategory',
    'as' => 'edit-category'
]);

Route::post('/category/update-category',[
    'uses' => 'CategoryController@updateCategory',
    'as' => 'update-category'
]);

Route::get('/category/delete/{id}',[
    'uses' => 'CategoryController@deleteCategory',
    'as' => 'delete-category'
]);
// brand part route


Route::get('/add-brand',[
    'uses' => 'brandController@addBrand',
    'as' => 'add-brand'
]);

Route::post('/add-brand/save',[
    'uses' => 'brandController@saveBrand',
    'as' => 'new-brand'
]);

Route::get('/manage-brand',[
    'uses' => 'brandController@ManageBrand',
    'as' => 'manage-brand'
]);


//publish unpublish cat
Route::get('/brand/unpublished/{id}',[
    'uses' => 'brandController@unpublishedBrand',
    'as' => 'unpublished-brand'
]);

Route::get('/brand/published/{id}',[
    'uses' => 'brandController@publishedBrand',
    'as' => 'published-brand'
]);

// edit brand

Route::get('/brand/edit-brand/{id}',[
    'uses' => 'brandController@editBrand',
    'as' => 'edit-brand'
]);
Route::post('/brand/update-brand',[
    'uses' => 'brandController@updateBrand',
    'as' => 'update-brand'
]);

Route::get('/brand/delete/{id}',[
    'uses' => 'brandController@deleteBrand',
    'as' => 'delete-brand'
]);

// product route

Route::get('/product/add',[
    'uses' => 'ProductController@index',
    'as' => 'add-product'
]);


Route::get('/product/manage',[
    'uses' => 'ProductController@manageProduct',
    'as' => 'manage-product'
]);

Route::post('/product/new-product',[
    'uses' => 'ProductController@newProduct',
    'as' => 'new-product'
]);


// view details


Route::get('/product/view-product/{id}',[
    'uses' => 'ProductController@viewProduct',
    'as' => 'view-product'
]);
Route::get('/product/edit-product/{id}',[
    'uses' => 'ProductController@editProduct',
    'as' => 'edit-product'
]);

Route::post('/product/update-product',[
    'uses' => 'ProductController@updateProduct',
    'as' => 'update-product'
]);

// manage-order

Route::get('/manage-order',[
    'uses' => 'OrderController@manageOrder',
    'as' => 'manage-order'
]);

// view-order-detail

Route::get('/view-order-detail/{id}',[
    'uses' => 'OrderController@viewOrderDetail',
    'as' => 'view-order-detail'
]);

Route::get('/view-order-invoice/{id}',[
    'uses' => 'OrderController@viewOrderInvoice',
    'as' => 'view-order-invoice'
]);

Route::get('/download-invoice/{id}',[
    'uses' => 'OrderController@downloadInvoice',
    'as' => 'download-invoice'
]);
// ajax-email-check

Route::get('/ajax-email-check/{id}',[
    'uses' => 'checkoutController@ajaxEmailCheck',
    'as' => 'ajax-email-check'
]);







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
