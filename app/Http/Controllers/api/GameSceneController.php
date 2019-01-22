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

        $playingGame = Plays::gamePlayingExists($gn, $user);
        if ($playingGame['isset']){
            return [
                'game_id' => $playingGame['data'],
                'msg' => "a play has been associated to you!"
            ];
        }

        $playPending = Plays::gamePendingExists($gn);
        if ($playPending !== null){
            $result = Plays::addUserToGame($user, $playPending);
            return [
                'game_id' => $result
            ];
        }else{
            $result = Plays::makeNewGame($user, $gn);
            return [
                'game_id' => $result
            ];
        }
    }

    public function getGameState($game_id){
        $result = Plays::getGameStateOrDetails($game_id);
        if ($result['hasfound'] == false){
            return "no user has found yet.";
        }else{
            return $result['data'];
        }
    }
}
