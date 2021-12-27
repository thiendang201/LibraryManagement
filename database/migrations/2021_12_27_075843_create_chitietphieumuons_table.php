<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieumuonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieumuons', function (Blueprint $table) {
            $table->bigInteger("idSach");
            $table->bigInteger("idPM");
            $table->date("ngayTra")->nullable(true);
            $table->timestamps();
            $table->primary(['idSach', 'idPM']);
            $table->foreign('idSach')->references('id')->on('sachs')
                ->onUpdate('restrict')
                ->onDelete('cascade');
            $table->foreign('idPM')->references('id')->on('phieumuons')
                ->onUpdate('restrict')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphieumuons');
    }
}
