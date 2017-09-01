<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        // Create Role table
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        // Insert role init
        $roles = [
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Quản lý'],
            ['id' => 3, 'name' => 'Xe bus']
        ];

        foreach($roles as $role) {
            DB::table('roles')->insert($role);
        }

        // Create Users tale
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 50)->nullable();
            $table->string('username', 50)->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->integer('role')->references('id')->on('roles')->default(0);
            $table->timestamps();
        });

        // Insert user init
        DB::table('users')->insert([
            'name' => 'Giám mục',
            'username' => 'admin',
            'password' => bcrypt('story123'),
            'role' => 1
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
