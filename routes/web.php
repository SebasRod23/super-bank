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

Route::get('/', 'HomepageController@index')->name('homepage');

Route::get('/account-create', 'AccountController@create')->name('account.create');
Route::post('/account-create', 'AccountController@createAccount')->name('account.create-account');
Route::get('/account-manage/{accountId}', 'AccountController@manage')->name('account.manage');
Route::post('/account-update/{accountId}', 'AccountController@update')->name('account.update');
Route::get('/account-delete/{accountId}', 'AccountController@deleteAccount')->name('account.delete');

Route::get('/register', 'AuthController@register')->name('auth.register');
Route::post('/register', 'AuthController@saveUser')->name('auth.save-user');

Route::get('/login', 'AuthController@login')->name('auth.login');
Route::get('/loginAuth', 'AuthController@loginUser')->name('auth.login-auth');

Route::get('/logout', 'AuthController@logout')->name('auth.logout');

Route::get('/movement-create/{accountId}', 'MovementController@create')->name('movement.create');
Route::post('/movement-create/{accountId}', 'MovementController@createMovement')->name('movement.create-movement');
Route::get('/movement-edit/{accountId}/{movementId}', 'MovementController@edit')->name('movement.edit');
Route::post('/movement-edit/{accountId}/{movementId}', 'MovementController@editMovement')->name('movement.edit-movement');