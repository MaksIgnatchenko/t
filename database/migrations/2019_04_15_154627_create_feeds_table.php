<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('country');
            $table->unsignedInteger('challenge_id')->nullable();
            $table->unsignedInteger('proof_id')->nullable();
            $table->timestamps();

            $table->foreign('challenge_id')
                ->references('id')
                ->on('challenges')
                ->onDelete('cascade');
            $table->foreign('proof_id')
                ->references('id')
                ->on('proofs')
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
        Schema::dropIfExists('feeds');
    }
}
