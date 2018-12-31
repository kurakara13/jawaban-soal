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

Route::get('/', 'HomeController@index')->name('index');

Route::group(array('prefix' => 'program-duplikat'), function()
{
  Route::get('/', 'DuplikatController@index')->name('duplikat.index');
  Route::post('/post', 'DuplikatController@cekduplikat')->name('duplikat.post');
});

Route::group(array('prefix' => 'program-buble-sort'), function()
{
  Route::get('/', 'BubleSortController@index')->name('buble-sort.index');
  Route::post('/post', 'BubleSortController@buble_sort')->name('buble-sort.post');
});
