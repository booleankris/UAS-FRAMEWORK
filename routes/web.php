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

// Home
Route::get('/', 'CategoryController@index');

// Create Category
Route::get('/create', 'CategoryController@FormCreate');
Route::post('/insert', 'CategoryController@Create');

// Update Category
Route::get('/edit/{id}', 'CategoryController@FormEdit');
Route::post('/update/{id}', 'CategoryController@Update');

// Delete Category
Route::get('/delete/{id}', 'CategoryController@Delete');

