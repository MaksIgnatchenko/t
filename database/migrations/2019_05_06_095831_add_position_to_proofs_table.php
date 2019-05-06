<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPositionToProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proofs', function (Blueprint $table) {
            $table->unsignedInteger('position')->nullable();
            $table->unsignedInteger('reward')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proofs', function (Blueprint $table) {
            $table->dropColumn('position');
            $table->dropColumn('reward');
        });
    }
}
