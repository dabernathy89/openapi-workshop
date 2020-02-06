<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('contest_id')->nullable();
            $table->string('contestant_id')->nullable();

            $table->foreign('contestant_id')
                ->references('id')
                ->on('contestants')
                ->onDelete('set null');

            $table->foreign('contest_id')
                ->references('id')
                ->on('contests')
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
        Schema::dropIfExists('prizes');
    }
}
