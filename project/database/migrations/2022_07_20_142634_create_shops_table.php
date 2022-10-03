<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shopName');
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnDelete();
            $table->text('description');
            $table->string('founder')->nullable();
            $table->string('businessType')->nullable();
            $table->year('yearFounded')->nullable();
            $table->integer('numberOfBranch')->nullable();
            $table->text('location')->nullable();
            $table->integer('category_id');
            $table->string('majorProduct')->nullable();
            $table->string('minorProduct')->nullable();
            $table->string('targetCustomer')->nullable();
            $table->string('contactNo')->nullable();
            $table->string('contactEmail')->nullable();
            $table->string('websiteLink')->nullable();
            $table->string('facebookLink')->nullable();
            $table->string('twitterLink')->nullable();
            $table->string('linkedinLink')->nullable();
            $table->string('timeOfOperation')->default('Weekly');
            $table->string('startTime')->nullable();
            $table->string('closeTime')->nullable();
            $table->json('attachments')->nullable();
            $table->integer('status')->default(1);
            $table->string('slug')->unique();
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
        Schema::dropIfExists('shops');
    }
}
