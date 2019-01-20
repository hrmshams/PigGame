<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPagesController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return redirect('home');
    }
    public function games(){
        return view('pages.games');
    }
    public function usersPage(){
        return view('pages.usersPage');
    }
}
