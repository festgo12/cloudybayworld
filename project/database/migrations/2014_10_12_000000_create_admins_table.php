<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone');
            $table->string('photo');
            $table->integer('role_id')->unsigned();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some admin
		DB::table('admins')->insert([
			[
				'firstname' => 'Admin',
				'lastname' => 'Admin1',
				'username' => 'admin',
				'email' => 'admin@gmail.com',
				'phone' => '01629552892',
				'photo' => 'photo.jpg',
				'password' => '$2y$10$oEDCEsx4uPTD/FgMLowGYOogYBkA5WAeKEsDbDWMHYgdQaD4HFpje', //12345678
				'role_id' => '1',
				// 'status' => '1',
				'remember_token' => 'ZwmQmx0xd1Qz0gzprJfHusIDbwPBlGTOvhhjDqMVhvvG83P6hN5jSuP2Yc7z',

			]
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
