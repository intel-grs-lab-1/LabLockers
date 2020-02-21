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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Home route
Route::get('/home', 'HomeController@index')->name('home');

// Laptops
Route::get('/view/import', 'importController@importExportView')->name('import');
Route::get('/viewall', 'importController@allView')->name('viewall');
Route::get('/import/edit/{id}', 'importController@editCsv');
Route::any('/import', 'importController@handleImportLaptop');
Route::post('/import/updatedata/{id}', 'importController@updateImportData');
Route::post('/import/insertdata', 'importController@insertImportData')->name('insertdata');

//Export csv_data (Laptops)
Route::get('viewall/export', 'CsvFileExport@csv_export')->name('export');

//Tablets
Route::resource('tablets','TabletController');

// Dynamic drop-downs
// Accs
Route::get('add-accessories', 'HomeController@addAccessories')->name('add-accessories');
Route::post('post-accessories', 'HomeController@postAccessories')->name('post-accessories');
// Color
Route::get('add-color', 'HomeController@addColor')->name('add-color');
Route::post('post-color', 'HomeController@postColor')->name('post-color');
// Type
Route::get('add-type', 'HomeController@addType')->name('add-type');
Route::post('post-type', 'HomeController@postType')->name('post-type');
// Power supply
Route::get('add-powerSupply', 'HomeController@addPowerSupply')->name('add-powerSupply');
Route::post('post-powerSupply', 'HomeController@postPowerSupply')->name('post-powerSupply');
// Screen size
Route::get('add-screenSize', 'HomeController@addScreenSize')->name('add-screenSizepe');
Route::post('post-screenSize', 'HomeController@postScreenSize')->name('post-screenSize');
// thunderbolt
Route::get('add-ThunderboltPorts', 'HomeController@addThunderboltPorts')->name('add-ThunderboltPorts');
Route::post('post-ThunderboltPorts', 'HomeController@postThunderboltPorts')->name('post-ThunderboltPorts');
// touchscreen
Route::get('add-Touchscreen', 'HomeController@addTouchscreen')->name('add-Touchscreen');
Route::post('post-Touchscreen', 'HomeController@postTouchscreen')->name('post-Touchscreen');
// brand
Route::get('add-Brand', 'HomeController@addBrand')->name('add-Brand');
Route::post('post-Brand', 'HomeController@postBrand')->name('post-Brand');
// cpu OEM
Route::get('add-CPUMan', 'HomeController@addCPUMan')->name('add-CPUMan');
Route::post('post-CPUMan', 'HomeController@postCPUMan')->name('post-CPUMan');