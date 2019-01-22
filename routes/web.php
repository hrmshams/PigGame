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

/**
 * web pages routes
 */
Route::get('/', 'PublicPagesController@index');
Route::get('/makeGame', 'UserPagesController@makeGame');
Route::get('/games', 'PublicPagesController@games');
Route::get('/users', 'PublicPagesController@usersPage');
Route::get('/profile', 'UserPagesController@profile');

Route::get('/userReview', 'AdminPagesController@userReview');
Route::get('/gameReview', 'AdminPagesController@gameReview');

Route::get('/login', 'PagesController@login');

Route::get('/gameScene/{gameName}', 'PublicPagesController@gameScene');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //WTF IS THIS ?


/**
 * api routes
 */
Route::get('/api/users/{order?}', 'api\UsersController@getUsers');
Route::get('/api/games/{order?}', 'api\GamesController@getGames');
Route::post('/api/games/add_game', 'api\GamesController@addGame')->middleware('auth');

Route::get('/api/game_scene/ask_new_game/{game_name}', 'api\GameSceneController@askGame')->middleware('auth');
Route::get('/api/game_scene/get_game_state/{game_id}', 'api\GameSceneController@getGameState');


Route::get('/api/game_scene/end_game/{game_id}', 'api\GameSceneController@endGame');
Route::get('/api/game_scene/comment_user/{game_id}/{$comment}', 'api\GameSceneController@commentUser');
Route::get('/api/game_scene/comment_game/{game_id}/{$comment}', 'api\GameSceneController@commentGame');

Route::get('/api/get_reviews/{is_game_comments}', 'api\AdminController@getReviews');
Route::get('/api/get_reviews/{is_game_comments}', 'api\AdminController@getReviews');


