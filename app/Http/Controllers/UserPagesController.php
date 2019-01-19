<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
}
