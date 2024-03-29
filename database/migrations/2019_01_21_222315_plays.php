<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('game_name');
            $table->string('player1');
            $table->string('player2')->nullable();   
            $table->string('state');

            $table->timestamps();
        });

        DB::table('plays')->insert(
            [
                'game_name'=>'hamid game',
                'player1' => 'hamid3potter@gmail.com',
                'state'=>'pending',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plays');
    }
}
