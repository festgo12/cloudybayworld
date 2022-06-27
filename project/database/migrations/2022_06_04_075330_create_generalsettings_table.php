<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->double('tax')->default(0);
            $table->double('shipping_cost')->default(0);
            $table->double('fixed_commission')->default(0);
            $table->double('percentage_commission')->default(0);
            $table->tinyInteger('currency_format')->default(0);
            $table->timestamps();
        });

        // Insert some general settings value
        DB::table('generalsettings')->insert([
            [
                'tax' => '0',
                'shipping_cost' => '1',
                'fixed_commission' => '0.5',
                'percentage_commission' => '0',
                'currency_format' => '0',

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
        Schema::dropIfExists('generalsettings');
    }
}
