<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telephone_number');
            $table->string('photo');
            $table->rememberToken();

            $table->unsignedInteger('rol_id');
            $table->unsignedInteger('estadousuario_id');

            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('rols');
            $table->foreign('estadousuario_id')->references('id')->on('estadousuarios');
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
            $table->dropForeign('users_rol_id_foreign');
            $table->dropForeign('users_estadousuario_id_foreign');
        });
        Schema::dropIfExists('users');
    }
}
