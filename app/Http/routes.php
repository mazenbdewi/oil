<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

*/





// Admin panel 

Route::group(['middleware'=>['web','admin']] , function(){


//Route::get('/adminpanel/employees/data',['as'=>'adminpanel.employees.data','uses'=>'EmployeesController@anyData']);
Route::get('/adminpanel','AdminController@index');
Route::resource('/adminpanel/employees','EmployeeController');
Route::resource('/adminpanel/careers','CareerController');
Route::resource('/adminpanel/customers','CustomerController');
Route::resource('/adminpanel/providers','ProviderController');
Route::resource('/adminpanel/products','ProductController');
Route::resource('/adminpanel/categories','CategoryController');
Route::resource('/adminpanel/warehouses','WarehouseController');

Route::get('/adminpanel/accounts/showCash','AccountController@showCash');

Route::resource('/adminpanel/accounts','AccountController');
Route::resource('/adminpanel/ordersells','OrderController');
Route::resource('/adminpanel/ordersells/product','AddProductController');
Route::resource('/adminpanel/incomes','IncomesController');


});

Route::get('/adminpanel/employees/{id}/delete','EmployeeController@destroy') ;
Route::get('/adminpanel/careers/{id}/delete','CareerController@destroy');
//Route::get('/adminpanel/customers/{id}/delete','CustomerController@destroy');
Route::get('/adminpanel/providers/{id}/delete','ProviderController@destroy');
Route::get('/adminpanel/products/{id}/delete','ProductController@destroy');
Route::get('/adminpanel/categories/{id}/delete','CategoryController@destroy');
Route::get('/adminpanel/products/{id}/delete','AddProductController@destroy');
Route::get('/adminpanel/ordersells/{id}/delete','OrderController@destroy');
Route::get('/adminpanel/inv/form','InvoiceController@form');
Route::post('/adminpanel/inv/save','InvoiceController@save');
Route::get('/adminpanel/inv/{id}','InvoiceController@show');
Route::get('/adminpanel/inv/','InvoiceController@index');
Route::get('/adminpanel/inv/{id}/delete','InvoiceController@destroy');
Route::get('/adminpanel/view','PrintController@index');
Route::get('/adminpanel/inv/{id}/print','PrintController@printPreview');
//Route::get('/adminpanel/inv/{id}/getPDF','PDFController@getPDF');

Route::auth();

Route::get('/', function () {
   return view('welcome');
});


Route::get('/', 'MainController@index');

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

