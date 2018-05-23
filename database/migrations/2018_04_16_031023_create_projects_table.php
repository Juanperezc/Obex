<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['web-design']);
            $table->string('description');
            $table->date('start');
            $table->date('finish');
            $table->enum('state', ['on-hold', 'in-progress', 'culminated', 'cancelled']);
            $table->unsignedInteger('client_id');
            $table->timestamps();$table->softDeletes();
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
