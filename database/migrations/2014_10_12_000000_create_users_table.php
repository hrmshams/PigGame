<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => 'hamid',
                'email' => 'hamid3potter@gmail.com',
                'password' => '$2y$10$V31YAOVXjig.B95QsARraedRafDQhf3A1AT9AgYThVMPOHGG34IYe',
                'is_admin' => false,
            ],
            [
                'id' => 2,
                'name' => 'admin agha',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$V31YAOVXjig.B95QsARraedRafDQhf3A1AT9AgYThVMPOHGG34IYe',
                'is_admin' => true,
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
        Schema::dropIfExists('users');
    }
}
