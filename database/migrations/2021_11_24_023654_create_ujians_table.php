<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ujians')) {
            Schema::create('ujians', function (Blueprint $table) {
                $table->id();
                $table->integer('program_belajar_id');
                $table->integer('kelas_id');
                $table->datetime('waktu_mulai');
                $table->datetime('waktu_selesai');
                $table->string('token')->unique();
                $table->string('judul');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujians');
    }
}
