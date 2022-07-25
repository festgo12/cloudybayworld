<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sign');
            $table->double('value');
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
        });




        // Insert some currencies value
            DB::table('currencies')->insert([
                [
                    'name' => 'USD',
                    'sign' => '$',
                    'value' => '1',
                    'is_default' => '0',
    
                ],
                [
                    'name' => 'EUR',
                    'sign' => '€',
                    'value' => '0.89',
                    'is_default' => '0',
    
                ],
                [
                    'name' => 'NGN',
                    'sign' => '₦',
                    'value' => '500',
                    'is_default' => '1',
    
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
        Schema::dropIfExists('currencies');
    }
}
