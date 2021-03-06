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
  Route::post('/post', 'DuplikatController@cekDuplikat')->name('duplikat.post');
});

Route::group(array('prefix' => 'program-buble-sort'), function()
{
  Route::get('/', 'BubleSortController@index')->name('buble-sort.index');
  Route::post('/post', 'BubleSortController@bubleSort')->name('buble-sort.post');
});

Route::group(array('prefix' => 'bank'), function()
{
  Route::get('/', 'Bank\BankController@index')->name('bank.home');

  //topup
  Route::resource('topup', 'Bank\TopUpController', [
    'except' => ['update', 'edit', 'destroy']
  ]);

  //Profile
  Route::resource('profile', 'Bank\ProfileController', [
    'except' => ['create', 'show', 'store', 'destroy']
  ]);

  //Bank Account
  Route::resource('bank-account', 'Bank\BankAccountController');
  Route::post('/bank-account/account-change', 'Bank\BankAccountController@accountChange')->name('bank.account.change');

  //Auth
  Route::get('/login', 'Auth\LoginController@showLoginForm')->name('bank.login');
  Route::post('/login', 'Auth\LoginController@login')->name('bank.login.post');
  Route::post('/logout', 'Auth\LoginController@logout')->name('bank.logout');
  Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('bank.register');
  Route::post('/register', 'Auth\RegisterController@register')->name('bank.register.post');
});

// Auth::routes();
