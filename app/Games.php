<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{    
    public function getData(){
        return Games::find(1);
    }
}
