<?php
/**
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Plays extends Model
{
    protected $table = 'plays';

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
        $p = Plays::where('id', $game_id);
        if($p->state == "pending"){
            return [
                'state' => -1,
                'data' => null,
            ];
        } else {
            return [
                'state' => 1,
                'data' => $p
            ];
        }
    }
}
