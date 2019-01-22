<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Models\Plays;
use App\Http\Models\UsersComments;
use App\Http\Models\GamesComments;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user');
    }

    public function getReviews($type){
        if ($type == 'games'){
            $comments = GamesComments::where('is_accepted', false)->get();
            return $comments;
        }else{
            $comments = UsersComments::where('is_accepted', false)->get();
            return $comments;
            // return '123';
        }
    }

}
