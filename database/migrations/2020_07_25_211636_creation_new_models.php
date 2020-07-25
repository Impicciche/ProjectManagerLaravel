<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationNewModels extends Migration
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
            $table->longText('firstname');
            $table->longText('lastname');
            $table->longText('address');
            $table->string('email');
            $table->string('phone');
            
            $table->timestamps();
        });
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('project_id');
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
            $table->unsignedBigInteger('user_assing');
            $table->unsignedBigInteger('project_id');
            $table->string('title');
            $table->string('description');
            $table->string('status')->nullable();
            $table->foreign('user_creator')->references("id")->on("users");
            $table->foreign('user_assing')->references("id")->on("users");
            $table->foreign('project_id')->references("id")->on("projects");
            
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
