<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $table = 'games';
    public static $orders = [
        'newest' => 'newest',
        'score' => 'score',
        'gameNumbers' => 'gameNumbers',
        'gameNumbersPerDay' => 'gameNumbersPerDay',
    ];

    public static function getAllGames(){
        return Games::all();
    }

    public static function getGamesByOrder($order){
        if ($order == Games::$orders['newest']){
            $data = Games::orderBy('created_at', 'desc')->get();
            
        }else if ($order == Users::$orders['score']){
            $data = Games::orderBy('score')->get();

        }else if ($order == Users::$orders['gameNumbers']){
            $data = Games::orderBy('game_numbers')->get();

        }else if ($order == Users::$orders['gameNumbersPerDay']){
            $data = Games::orderBy('game_numbers_per_day')->get();

        }else 
            return [
                'data' => null,
                'status' => -1,
            ];

        return [
            'data' => $data,
            'status' => 200,
        ];
    }


    public static function validateAddGameData($data){
        if (!isset($data['name']))
            return false;
        if (!isset($data['maximumScore']))
            return false;
        if (!isset($data['zeroMaker']))
            return false;
        if (!isset($data['dicesNumber']))
            return false;

        return true;
    }

    public static function getGame($name){
        $game = Games::where('name', $name)->first();
        return $game;
    }

    public static function addGame($data){
        $game = new Games;

        try {
            $game->name = $data->name;
            $game->maximum_score = $data->maximumScore;
            $game->zero_maker = $data->zeroMaker;
            $game->maximum_throw = $data->maximumThrow;
            $game->dices_number = $data->dicesNumber;
            
            $game->save();

            return 1;
        }catch(Exception $e){
            return -1;
        }
    }
}
