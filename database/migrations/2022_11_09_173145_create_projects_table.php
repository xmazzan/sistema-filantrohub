<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("image")->nullable();
            $table->string("title"); //->index();;
            $table->json("days");
            $table->string('phone'); //->index();
            $table->string('postcode')->nullable(); //->index();
            $table->string('state')->nullable(); //->index();
            $table->string('city')->nullable(); //->index();
            $table->string('neighborhood')->nullable(); //->index();
            $table->string('street')->nullable(); //->index();
            $table->string('number')->nullable(); //->index();
            $table->string('complement')->nullable(); //->index();
            $table->text("description");
            //$table->foreignId('user_id')->constrained();
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
        //$table->foreignId('user_id')->constrained()->onDelete('cascade');
    }
};
