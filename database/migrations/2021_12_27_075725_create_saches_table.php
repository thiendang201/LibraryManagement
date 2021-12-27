<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saches', function (Blueprint $table) {
            $table->id();
            $table->string('tenSach');
            $table->longText('moTa');
            $table->integer('soLuong');
            $table->string('tacGia');
            $table->string('NXB');
            $table->decimal('gia');
            $table->string('anhBia');
            $table->unsignedBigInteger('danhMuc_id');
            $table->foreign('danhMuc_id')->references('id')->on('danhmucs')->onUpdate('restrict')->onDelete('cascade');
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
        Schema::dropIfExists('saches');
    }
}
