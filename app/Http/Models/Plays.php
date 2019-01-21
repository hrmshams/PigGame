<?php
/**
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Plays extends Model
{
    protected $table = 'plays';

    public static function gamePendingExists(){
        $requests = Plays::where([
            ['game_name', '=', $gn],
            ['state', '=', 'pending']
        ]);
        $requests = Plays::where('game_name', $gn);

        if ($requests->count() > 0)
            return true;
        else
            return false;
    }

}
