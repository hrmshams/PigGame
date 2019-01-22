<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->string('receiver');
            $table->string('comment');   
            $table->boolean('is_accepted')->default(false);

            $table->timestamps();
        });

        DB::table('users_comments')->insert(
            [
                'sender' => 'hamid3potter@gmail.com',
                'receiver' => 'hrm.shams@gmail.com',
                'comment' => 'this is test',
            ]
        );

        //
        
        Schema::create('games_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->string('game_name');
            $table->string('comment');   
            $table->boolean('is_accepted')->default(false);

            $table->timestamps();
        });

        DB::table('games_comments')->insert(
            [
                'sender' => 'hamid3potter@gmail.com',
                'game_name' => 'hamidgame',
                'comment' => 'this is a test for game',
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
        Schema::dropIfExists('users_comments');
        Schema::dropIfExists('games_comments');

    }
}
