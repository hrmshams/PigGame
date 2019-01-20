<?php

use Illuminate\Http\Request;
use App\Games;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users/{order?}', 'api\UsersController@getUsers');
Route::get('/games/{order?}', 'api\GamesController@getGames');
Route::post('/games/add_game', 'api\GamesController@addGame')->middleware('auth');
