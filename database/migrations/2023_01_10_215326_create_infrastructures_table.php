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
            $table->text('school_address');
            $table->string('school_bp');
            $table->timestamp('date_created');
            $table->string('A1')->nullable();
            $table->string('A2')->nullable();
            $table->string('A3')->nullable();
            $table->string('A4')->nullable();
            $table->string('A5')->nullable();
            $table->string('B1')->nullable();
            $table->string('B2')->nullable();
            $table->string('B3')->nullable();
            $table->string('C1')->nullable();
            $table->string('C2')->nullable();
            $table->string('C3')->nullable();
            $table->string('C4')->nullable();
            $table->string('C5')->nullable();
            $table->string('C6')->nullable();
            $table->string('C7')->nullable();
            $table->string('C8')->nullable();
            $table->string('C9')->nullable();
            $table->string('D1')->nullable();
            $table->string('D2')->nullable();
            $table->string('D3')->nullable();
            $table->string('D4')->nullable();
            $table->string('D5')->nullable();
            $table->string('D6')->nullable();
            $table->string('E1')->nullable();
            $table->string('E2')->nullable();
            $table->string('E3')->nullable();
            $table->text('explanation_A1')->nullable();
            $table->text('explanation_A2')->nullable();
            $table->text('explanation_A3')->nullable();
            $table->text('explanation_A4')->nullable();
            $table->text('explanation_A5')->nullable();
            $table->text('explanation_B1')->nullable();
            $table->text('explanation_B2')->nullable();
            $table->text('explanation_B3')->nullable();
            $table->text('explanation_C1')->nullable();
            $table->text('explanation_C2')->nullable();
            $table->text('explanation_C3')->nullable();
            $table->text('explanation_C4')->nullable();
            $table->text('explanation_C5')->nullable();
            $table->text('explanation_C6')->nullable();
            $table->text('explanation_C7')->nullable();
            $table->text('explanation_C8')->nullable();
            $table->text('explanation_C9')->nullable();
            $table->text('explanation_D1')->nullable();
            $table->text('explanation_D2')->nullable();
            $table->text('explanation_D3')->nullable();
            $table->text('explanation_D4')->nullable();
            $table->text('explanation_D5')->nullable();
            $table->text('explanation_D6')->nullable();
            $table->text('explanation_E1')->nullable();
            $table->text('explanation_E2')->nullable();
            $table->text('explanation_E3')->nullable();
            $table->text('notes')->nullable();
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
