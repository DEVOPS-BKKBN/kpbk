<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('file')->nullable();
            $table->integer('tahun')->lenght(4);
            $table->unsignedInteger('tipe')->nullable();
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id_kebijakan');
            $table->unsignedInteger('level');
            $table->unsignedInteger('id_prov');
            $table->unsignedInteger('id_kab');
            $table->unsignedInteger('created_by');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('mst_kategori');
            $table->foreign('id_kebijakan')->references('id')->on('mst_kebijakan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_data');
    }
}
