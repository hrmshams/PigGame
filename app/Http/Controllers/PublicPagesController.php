<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Games;

class PublicPagesController extends Controller
{
    public function __construct()
    {}

    public function index(){
        return redirect('home');
    }
    public function games(){
        return view('pages.games');
    }
    public function usersPage(){
        return view('pages.usersPage');
    }
    public function gameScene($gameName){
        if (Games::where('name', $gameName)->count() > 0)
            return view('pages.gameScene', ['gameName'=>$gameName]);
        else
            return "404";
    }
}
