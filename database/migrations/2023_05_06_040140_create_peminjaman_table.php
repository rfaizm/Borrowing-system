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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();

            //ganti jadi datetime biar bisa nampung waktu
            $table->dateTime('tgl_pinjaman')->required();
            $table->time('waktu_kembali')->required(); //bikin bisa null
            $table->time('waktu_pinjam')->required(); //bikin bisa null


            $table->string('no_telp', 20)->required();
            $table->string('keperluan', 100)->required();
            $table->string('status_pinjaman', 100)->required();
            
            $table->timestamps();
            //

            // foreign key
            // $table->unsignedBigInteger('siswa_id')->required()->after('no_telp');
            // $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('restrict');

            // $table->unsignedBigInteger('admin_id')->required()->after('siswa_id');
            // $table->foreign('admin_id')->references('id')->on('admin')->onDelete('restrict');

            // $table->dropForeign(['class_id']);
            // $table->dropColumn('class_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
