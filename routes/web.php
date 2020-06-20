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
/*Route::get('importExportView', 'UserController@importExportView');
Route::get('export', 'UserController@export')->name('export');
Route::post('import', 'UserController@import')->name('import');*/

//Route::get('store', 'ModuleController@importView');
//Route::post('store','ModuleController@store')->name('store');
