<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    public static $orders = [
        'newest' => 'newest',
        'score' => 'score',
        'play_time' => 'play_time'
    ];

    public static function getAllUsers(){
        return Users::all();
    }

    public static function getUsersByOrder($order){
        if ($order == Users::$orders['newest']){
            $data = Users::orderBy('created_at', 'desc')->get();
            
        }else if ($order == Users::$orders['newest']){
            $data = Users::orderBy('score')->get();

        }else if ($order == Users::$orders['newest']){
            $data = Users::orderBy('play_time')->get();

        }else 
            return [
                'data' => null,
                'status' => -1,
            ];

        return [
            'data' => $data,
            'status' => 200,
        ];
    }
}
