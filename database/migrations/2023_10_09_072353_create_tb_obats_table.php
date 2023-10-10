<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obats', function (Blueprint $table) {
            $table->bigInteger('id_obat');
            $table->bigInteger('id_jenis_obat');
            $table->string('nama_obat');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('stok');
            $table->dateTime('tanggal_expired');
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
        Schema::dropIfExists('tb_obats');
    }
}
