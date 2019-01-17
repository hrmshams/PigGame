<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function lists(){
        $items = array(
            "item1",
            "item2"
        );
        return view('pages.lists')->with('lists', $items);
    }
    public function login(){
        return view('pages.login');
    }
}
