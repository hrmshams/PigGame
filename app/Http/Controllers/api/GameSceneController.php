<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Models\Plays;
use App\Http\Controllers\Controller;

class GameSceneController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user');
    }

    public function askGame($game_name){
        
        // $gn = substr($game_name, 1, strlen($game_name)-1);

        // if (Plays::gamePendingExists($gn)){

        // }else{

        // }
    }

    public function getGameState($game_id){
        // 
    }
}
