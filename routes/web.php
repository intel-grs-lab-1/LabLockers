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

Route::get('/view/import', 'importController@importExportView')->name('import');
Route::get('/viewall', 'importController@allView')->name('viewall');
Route::get('/import/edit/{id}', 'importController@editCsv');

Route::any('/import', 'importController@handleImportLaptop');
Route::post('/import/updatedata/{id}', 'importController@updateImportData');
Route::post('/import/insertdata', 'importController@insertImportData')->name('insertdata');

Route::get('viewall/export', 'CsvFileExport@csv_export')->name('export');
