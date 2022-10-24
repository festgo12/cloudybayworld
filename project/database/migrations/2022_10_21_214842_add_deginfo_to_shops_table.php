<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeginfoToShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->string('coverImage')->nullable();
            $table->string('degree')->nullable();
            $table->string('profession')->nullable();
            $table->string('skill')->nullable();
            $table->string('experience')->nullable();
            $table->string('achievements')->nullable();
            $table->string('fieldsOfInterest')->nullable();
            $table->string('partners')->nullable();
            $table->string('recommendation')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('coverImage');
            $table->dropColumn('degree');
            $table->dropColumn('profession');
            $table->dropColumn('skill');
            $table->dropColumn('experience');
            $table->dropColumn('achievements');
            $table->dropColumn('fieldsOfInterest');
            $table->dropColumn('partners');
            $table->dropColumn('recommendation');
        });
    }
}
