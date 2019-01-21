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
            $result = Plays::makeNewGame($user, $gn);
            return $result;
        }
    }

    public function getGameState($game_id){
        $result = Plays::getGameStateOrDetails($game_id);
        if ($result->state == -1){
            return "no user has found yet.";
        }else{
            return $result->data;
        }
    }
}
