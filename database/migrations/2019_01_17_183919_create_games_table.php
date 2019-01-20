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
            $table->string('name')->unique();
            $table->integer('maximum_score');
            $table->string('zero_maker');
            $table->integer('maximum_throw');
            $table->integer('dices_number');

            $table->decimal('rate')->default(0);
            $table->integer('played')->default(0);

            $table->timestamps();
        });

        DB::table('games')->insert(
            [
                'name' => 'hamid game',
                'maximum_score' => 100,
                'zero_maker' => '6',
                'maximum_throw' => 5,
                'dices_number' => 1
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
