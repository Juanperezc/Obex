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
            $table->string('doc_id')->unique()->nullable();// cedula
            $table->string('name');
            $table->string('last_name');
            $table->string('profile_img')->nullable()->default('a1.png');
            $table->decimal('salary', 8, 2)->default(0)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('charge')->unsigned()->nullable();
            
            $table->rememberToken();
             $table->timestamps();$table->softDeletes();
            $table->foreign('charge')->references('id')->on('charges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
