<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->timestamp('date_created');
            $table->string('answer_1')->nullable();
            $table->string('answer_2')->nullable();
            $table->string('answer_3')->nullable();
            $table->string('answer_4')->nullable();
            $table->string('answer_5')->nullable();
            $table->string('answer_6')->nullable();
            $table->string('answer_7')->nullable();
            $table->string('answer_8')->nullable();
            $table->string('answer_9')->nullable();
            $table->string('answer_10')->nullable();
            $table->string('answer_11')->nullable();
            $table->string('answer_12')->nullable();
            $table->string('answer_13')->nullable();
            $table->string('answer_14')->nullable();
            $table->string('answer_15')->nullable();
            $table->string('answer_16')->nullable();
            $table->string('answer_17')->nullable();
            $table->string('answer_18')->nullable();
            $table->string('answer_19')->nullable();
            $table->string('answer_20')->nullable();
            $table->string('answer_21')->nullable();
            $table->string('answer_22')->nullable();
            $table->string('answer_23')->nullable();
            $table->string('answer_24')->nullable();
            $table->string('answer_25')->nullable();
            $table->string('answer_26')->nullable();
            $table->string('answer_27')->nullable();
            $table->string('answer_28')->nullable();
            $table->string('explanation_1')->nullable();
            $table->string('explanation_2')->nullable();
            $table->string('explanation_3')->nullable();
            $table->string('explanation_4')->nullable();
            $table->string('explanation_5')->nullable();
            $table->string('explanation_6')->nullable();
            $table->string('explanation_7')->nullable();
            $table->string('explanation_8')->nullable();
            $table->string('explanation_9')->nullable();
            $table->string('explanation_10')->nullable();
            $table->string('explanation_11')->nullable();
            $table->string('explanation_12')->nullable();
            $table->string('explanation_13')->nullable();
            $table->string('explanation_14')->nullable();
            $table->string('explanation_15')->nullable();
            $table->string('explanation_16')->nullable();
            $table->string('explanation_17')->nullable();
            $table->string('explanation_18')->nullable();
            $table->string('explanation_19')->nullable();
            $table->string('explanation_20')->nullable();
            $table->string('explanation_21')->nullable();
            $table->string('explanation_22')->nullable();
            $table->string('explanation_23')->nullable();
            $table->string('explanation_24')->nullable();
            $table->string('explanation_25')->nullable();
            $table->string('explanation_26')->nullable();
            $table->string('explanation_27')->nullable();
            $table->string('explanation_28')->nullable();
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
        Schema::dropIfExists('infrastructures');
    }
}
