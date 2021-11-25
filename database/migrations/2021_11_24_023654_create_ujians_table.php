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
                $table->string('judul');
                $table->integer('program_akademik_id');
                $table->integer('kelas_id');
                $table->datetime('waktu_mulai');
                $table->datetime('waktu_selesai');
                $table->string('token')->unique();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
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
