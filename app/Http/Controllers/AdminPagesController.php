<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function userReview(){
        return view('pages.userReview');
    }
    public function gameReview(){
        return view('pages.gameReview');
    }
}
