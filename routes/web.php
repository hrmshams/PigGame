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

Route::get('/', 'PublicPagesController@index');
Route::get('/makeGame', 'PagesController@makeGame');
Route::get('/games', 'PublicPagesController@games');
Route::get('/users', 'PublicPagesController@usersPage');
Route::get('/profile', 'PagesController@profile');

Route::get('/userReview', 'PagesController@userReview');
Route::get('/gameReview', 'PagesController@gameReview');

Route::get('/login', 'PagesController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
