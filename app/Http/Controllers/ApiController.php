<?php
namespace App\Http\Controllers;

use App\Games as Games;
use App\Test as Test;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function gamesAdd($data){
        $game = new Games;
        // $game->name = $data;
        // $game->save();
    
        return $game->getData();
    }
}
