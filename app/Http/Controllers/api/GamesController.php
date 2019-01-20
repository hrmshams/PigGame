<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Models\Games;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user');
    }

    public function getGames($order = null){
        if (!isset($order)){
            $data = Games::getAllGames();
            return response($data, 200);

        }else{
            $result = Games::getGamesByOrder($order);
            if ($result['status'] == -1)
                return response("bad order argumant : ".$order, 400);
            else
                return response($result['data'], 200);
        }
    }


    public function addGame(Request $request){
        if (Games::validateAddGameData($request)){

            $g = Games::getGame($request['name']);

            if ($g){
                return response("repetitive name for game.", 400);
            }

            $result = Games::addGame($request);

            if ($result == -1){
                return response("some error in adding game to database happened.", 500);
            }else{
                return response("successfuly game added.", 201);
            }        
        }else{
            return response("data format is not valid.", 400);
        }     
    }
}
