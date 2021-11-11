<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstmatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estmators', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->enum('type',['MCQ','TF']);
            $table->json('ansMCQ')->nullable();
            $table->json('ansTF')->nullable();

            $table->integer('order');
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
        Schema::dropIfExists('estmators');
    }
}
