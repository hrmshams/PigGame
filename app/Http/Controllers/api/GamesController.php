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
}
