<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number');
            $table->string('country_code');
            $table->boolean('is_registration_completed')->default(false);
            $table->string('avatar')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('sex')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('company')->nullable();
            $table->dropColumn('name');
            $table->string('full_name')->nullable();

            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('country_code');
            $table->dropColumn('is_registration_completed');
            $table->dropColumn('avatar');
            $table->dropColumn('birthday');
            $table->dropColumn('sex');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('company');
            $table->dropColumn('full_name');
            $table->string('name');

            $table->string('email')->nullable(false)->change();
        });
    }
}
