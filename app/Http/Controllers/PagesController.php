<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function makeGame(){
        return view('pages.makeGame');
    }
    public function games(){
        return view('pages.games');
    }
    public function usersPage(){
        return view('pages.usersPage');
    }
    public function profile(){
        return view('pages.profile');
    }


    public function userReview(){
        return view('pages.userReview');
    }
    public function gameReview(){
        return view('pages.gameReview');
    }


    public function login(){
        return view('pages.login');
    }
}
