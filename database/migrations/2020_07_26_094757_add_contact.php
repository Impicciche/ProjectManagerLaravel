<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('tva');
            
            $table->timestamps();
        });
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->longText('firstname');
            $table->longText('lastname');
            $table->longText('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            
            $table->foreign('client_id')->references("id")->on("clients");

            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('responsable_id');
            $table->string('title');
            $table->string('description');
            $table->string('status')->nullable();
            $table->foreign('client_id')->references("id")->on("clients");
            $table->foreign('responsable_id')->references("id")->on("users");
            
            $table->timestamps();
        });
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('resplay_id')->nullable();
            $table->string('title');
            $table->string('message');
            $table->foreign('project_id')->references("id")->on("projects");
            $table->foreign('user_id')->references("id")->on("users");
            $table->foreign('resplay_id')->references("id")->on("messages");
            
            $table->timestamps();
        });
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_creator');
            $table->unsignedBigInteger('project_id');
            $table->string('title');
            $table->string('description');
            $table->string('status')->nullable();
            $table->foreign('user_creator')->references("id")->on("users");
            $table->foreign('project_id')->references("id")->on("projects");
            
            $table->timestamps();
        });
        Schema::create('tasks_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references("id")->on("users");
            $table->foreign('task_id')->references("id")->on("tasks");
            
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
        //
    }
}
