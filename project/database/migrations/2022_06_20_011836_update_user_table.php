<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('companyName')->nullable();
            $table->string('contactNo')->nullable();
            $table->string('homeAddress')->nullable();
            $table->string('city')->nullable();
            $table->string('zipCode')->nullable();
            $table->integer('countryId')->nullable();
            $table->text('aboutUser')->nullable();
            $table->text('userBio')->nullable();
            $table->string('profession')->nullable();
            $table->string('websiteUrl')->nullable();
            $table->json('attachments')->nullable();
            $table->date('dateOfBirth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
