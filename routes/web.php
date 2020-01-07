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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('laptops', 'laptopController');


Route::get('/view/import', 'importController@importExportView');
Route::get('/viewall', 'importController@allView')->name('viewall');
Route::get('/import/edit/{id}', 'importController@editCsv');

Route::any('/import', 'importController@handleImportLaptop');
Route::post('/import/updatedata/{id}', 'importController@updateImportData');
Route::get('/import/export/{id}', 'importController@exportCsvData');
Route::post('/import/insertdata', 'importController@insertImportData')->name('insertdata');
