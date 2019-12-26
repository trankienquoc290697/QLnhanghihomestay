<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTienNghiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tiennghi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('maphong_id');
            $table->foreign('maphong_id')->references('id')->on('phong');
            $table->string('tentiennghi');
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
        Schema::dropIfExists('tien_nghi');
    }
}
