<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Models\Plays;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GameSceneController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user');
    }

    public function askGame($game_name){
        $user = Auth::User();

        $gn = substr($game_name, 1, strlen($game_name)-1);

        $play = Plays::gamePendingExists($gn);
        if ($play !== null){
            $result = Plays::addUserToGame($user, $play);
            return $result;
        }else{
            $result = Plays::makeNewGame($user, $game_name);
            return $result;
        }
    }

    public function getGameState($game_id){
        // 
    }
}
