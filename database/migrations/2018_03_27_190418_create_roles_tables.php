<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles',function(Blueprint $table) {
          $table->string('name');
          $table->string('label');
          $table->increments('id');
          $table->timestamps();
        });

        Schema::create('permissions', function(Blueprint $table){
          $table->increments('id');
          $table->string('name');
          $table->string('label');
          $table->timestamps();
        });

        Schema::create('permission_role', function(Blueprint $table){
          $table->integer('permission_id')->unsigned();
          $table->integer('role_id')->unsigned();

          $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

          $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        Schema::create('role_user', function(Blueprint $table){
          $table->integer('role_id')->unsigned();
          $table->integer('user_id')->unsigned();

          $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles', 'permissions', 'permission_role', 'role_user');
    }
}