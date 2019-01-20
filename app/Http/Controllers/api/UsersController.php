<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Models\Users;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user');
    }

    public function getUsers($order = null){
        if (!isset($order)){
            $data = Users::getAllUsers();
            return response($data, 200);

        }else{
            $result = Users::getUsersByOrder($order);
            if ($result['status'] == -1)
                return response("bad order argumant : ".$order, 400);
            else
                return response($result['data'], 200);
        }
    }
}
