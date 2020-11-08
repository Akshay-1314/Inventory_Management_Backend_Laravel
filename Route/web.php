<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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


Route::view('/','index');
Route::get('/signup',function(){
    if(!session()->has('data')){
        return view('signup');
    }
    else{
        return redirect()->back();
    }
});
Route::post('/signup_manufacturer','UserController@signup_manufacturer');
Route::post('/signup_seller','UserController@signup_seller');
Route::post('/login_manufacturer','UserController@login_manufacturer');
Route::post('/login_seller','UserController@login_seller');




Route::get('/logout','UserController@logout');
Route::view('/home','index');


Route::group(['middleware'=>['RestrictAccess']],function(){
    Route::view('/dashboard','dashboard');
    Route::get('/inventory','UserController@Inventory');
    Route::get('/invoice','UserController@sellers_invoice');
    Route::get('/Invoice','UserController@manufacturers_invoice');
    Route::post('/addProductManufacturer','UserController@add_manufacturer_inventory');
    Route::post('/addProductSeller','UserController@add_seller_inventory');
    Route::get('/delete/{id}','UserController@delete_manufacturer_product');
    Route::get('/del/{id}','UserController@delete_seller_product');
    Route::get('/item_requests/{id}','UserController@item_requests');
    Route::post('confirm_quantity','UserController@confirm_quantity');
    Route::get('/grant_request/{manufacturer_product_id}/{id}','UserController@grant_request');
    Route::post('/update_selling_price','UserController@update_selling_price');
    Route::post('/customer_details','UserController@customer_details');
    Route::get('/item_sell/{id}','UserController@item_sell');
    Route::post('/quantity_sold','UserController@quantity_sold');
    Route::get('/remove_item/{seller_product_id}/{id}','UserController@remove_item');
    Route::post('/inventory/edit_delete_seller_inventory', 'UserController@edit_delete_seller_inventory')->name('inventory.edit_delete_seller_inventory');
    Route::post('/inventory/edit_delete_manufacturer_inventory','UserController@edit_delete_manufacturer_inventory')->name('inventory.edit_delete_manufacturer_inventory');
    Route::get('/items_sold_customer','UserController@items_sold_customer');
    Route::post('/store_details','UserController@store_details');
    Route::get('/soldto/{email}','UserController@soldto');
    Route::get('/bill','UserController@bill')->name('bill');
    Route::get('edit_customer_details/{mobile}','UserController@edit_customer_details');
});


Route::get('/delete_manufacturers','UserController@delete_manufacturers');
Route::get('/delete_sellers','UserController@delete_sellers');



