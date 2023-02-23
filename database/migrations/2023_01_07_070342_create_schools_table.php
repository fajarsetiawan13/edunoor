<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('npsn');
            $table->string('bp');
            $table->string('status');
            $table->string('status_kepemilikan');
            $table->string('sk_pendirian')->nullable();
            $table->string('sk_pendirian_tanggal')->nullable();
            $table->string('sk_ijin_operasional')->nullable();
            $table->string('sk_ijin_operasional_tanggal')->nullable();
            $table->string('kepsek');
            $table->string('akreditasi');
            $table->string('kurikulum');
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
        Schema::dropIfExists('schools');
    }
}
