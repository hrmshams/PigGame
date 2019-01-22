<?php
/**
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Plays extends Model
{
    protected $table = 'plays';

    public static function gamePlayingExists($gn, $user){
        $play = Plays::where([
            ['game_name', '=', $gn],
        ])->first();

        if (isset($play)){
            if ($play->player1 == $user->email || $play->player2 == $user->email){
                return [
                    'isset' => true,
                    'data' => $play->id
                ];
            }    
        }
        return [
            'isset' => false,
            'data' => null
        ];
    }

    public static function gamePendingExists($gn){
        $requests = Plays::where([
            ['game_name', '=', $gn],
            ['state', '=', 'pending']
        ])->first();

        if (isset($requests) && $requests->count() > 0)
            return $requests;
        else
            return null;
    }

    public static function addUserToGame($user, $play){
        $play->player2 = $user->email;
        $play->state = 'playing';

        $play->save();

        return $play->id;
    }

    public static function makeNewGame($user, $game_name){
        $play = new Plays;
        $play->player1 = $user->email;
        $play->game_name = $game_name;
        $play->state = 'pending';

        $play->save();

        return $play->id;
    }

    public static function getGameStateOrDetails($game_id){
        // return $game_id;
        $p = Plays::where('id', $game_id)->first();

        if(isset($p) && $p->state == "pending"){
            return [
                'hasfound' => false,
                'data' => null,
            ];
        } else {
            return [
                'hasfound' => true,
                'data' => $p
            ];
        }
    }
}
