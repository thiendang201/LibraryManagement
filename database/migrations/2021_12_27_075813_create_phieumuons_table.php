<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieumuonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieumuons', function (Blueprint $table) {
            $table->id();
            $table->date("ngaymuon")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date("ngayhentra")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger("idNG");
            $table->timestamps();

            $table->foreign('idNG')->references('id')->on('users')
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
        Schema::dropIfExists('phieumuons');
    }
}
