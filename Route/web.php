<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\booking;
use App\lab;
use App\test;
use App\labs_tests;
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
    Route::post('/addProductManufacturer','UserController@add_manufacturer_inventory');
    Route::post('/addProductSeller','UserController@add_seller_inventory');
    Route::get('/delete/{id}','UserController@delete_manufacturer_product');
    Route::get('/del/{id}','UserController@delete_seller_product');
    Route::get('/item_requests/{id}','UserController@item_requests');
    Route::post('confirm_quantity','UserController@confirm_quantity');
    Route::get('/grant_request/{manufacturer_product_id}/{id}','UserController@grant_request');
    Route::post('/update_selling_price','UserController@update_selling_price');
});


Route::get('/delete_manufacturers','UserController@delete_manufacturers');
Route::get('/delete_sellers','UserController@delete_sellers');



