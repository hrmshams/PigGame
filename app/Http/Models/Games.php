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
        if (!isset($data['diceNumber']))
            return false;

        return true;
    }

    public static function addGame($data){
        $game = new Games;

        try {
            $game->name = $data->name;
            $game->maximumScore = $data->maximumScore;
            $game->zeroMaker = $data->zeroMaker;
            $game->maximumThrow = $data->maximumThrow;
            $game->dicesNumber = $data->diceNumber;    
            
            $game->save();

            return 1;
        }catch(Exception $e){
            return -1;
        }
    }
}
