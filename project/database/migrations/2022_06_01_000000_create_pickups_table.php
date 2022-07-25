<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
             $table->increments('id');
             $table->string('location');
             $table->string('country');
             $table->string('state');
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
            
            
        });

        // Insert some locations
		DB::table('pickups')->insert([
			[
				'location' => 'Polo Mall, Ogui road',
				'country' => 'Nigeria',
				'state' => 'Enugu',

            ],
			[
				'location' => 'Old Part, Ogui road',
				'country' => 'Nigeria',
				'state' => 'Enugu',

            ],
			[
				'location' => 'UNN Campus, Nsukka',
				'country' => 'Nigeria',
				'state' => 'Enugu',

            ],
			[
				'location' => 'Old Maryland',
				'country' => 'Nigeria',
				'state' => 'Enugu',

            ],
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickups');
    }
}
