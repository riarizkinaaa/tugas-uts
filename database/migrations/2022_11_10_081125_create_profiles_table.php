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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('id_profile');
            $table->string('nama');
            $table->string('no_wa');
            $table->string('deskripsi_keb');
            $table->foreignId('id_jenisKeb');
            $table->foreignId('id_bagian');
            $table->string('desk_video');
            $table->enum('urgen', ['Urgent', 'Medium', 'Low']);
            $table->enum('kategori', ['laporan', 'permintaan']);
            $table->enum('progres', ['Dipelajari', 'Dikerjakan', 'Selesai', 'Dicanangkan']);
            $table->string('pic');
            $table->timestamps();

            $table->foreign('id_jenisKeb')->references('id_jenisKeb')->on('jenis_kebs');
            $table->foreign('id_bagian')->references('id_bagian')->on('bagians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
