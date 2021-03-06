<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table)
        {
            $table->charset = 'UTF8';
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->text('description_short')->nullable();
            $table->text('description')->nullable();
            $table->integer('urgent');
            $table->boolean('check')->default(false);
            $table->unsignedBigInteger('list_id');
            $table->foreign('list_id')->references('id' )->on('todo_lists')->onDelete('cascade')->onUpdate('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
