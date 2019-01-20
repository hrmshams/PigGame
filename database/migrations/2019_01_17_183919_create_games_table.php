<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->number('maximumScore');
            $table->string('zeroMaker');
            $table->number('maximumThrow');
            $table->number('dicesNumber');

            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => 'hamid game',
                'maximumScore' => 100,
                'zeroMaker' => '6',
                'maximumThrow' => 5,
                'dicesNumber' => 1
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
        Schema::dropIfExists('games');
    }
}
