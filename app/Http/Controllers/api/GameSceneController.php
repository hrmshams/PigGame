<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Models\Plays;
use App\Http\Models\UsersComments;
use App\Http\Models\GamesComments;

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

    public function endGame($game_id){
        Plays::where('id', $game_id)->first()->delete();
    }

    public function commentUser($game_id, $comment){
        $user = Auth::user();
        $p = Plays::where('id', $game_id)->first();

        $sender = $user->email;
        $reciever = "";
        if ($p->player1 === $user->email){
            $reciever = $p->player2;
        }else{
            $reciever = $p->player1;
        }
        
        $uComment = new UsersComments;
        $uComment->sender = $sender;
        $uComment->receiver = $reciever;
        $comment = $comment;

        $uComment->save();

        return 'user commentADDED';
    }

    public function commentGame($game_id, $comment){
        $user = Auth::user();
        $p = Plays::where('id', $game_id)->first();

        $sender = $user->email;
        $game_name = $p->game_name;

        $gComment = new GamesComments;
        $gComment->sender = $sender;
        $gComment->game_name = $game_name;
        $comment = $comment;

        $gComment->save();

        return 'game commentADDED';
    }
}
