<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *php
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('project_category')->nullable();
            $table->string('company_id');  //rel2
            $table->integer('salesperson_id')->nullable(); //rel2
            $table->integer('product'); //rel 3
            $table->integer('value');
            $table->string('project_type');
            $table->integer('sales_stage')->nullable(); 
            $table->string('status')->nullable();
            $table->string('tender')->nullable();
            $table->string('remarks')->nullable();
            $table->date('close_at')->nullable();
            $table->date('start_date');
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
        Schema::dropIfExists('projects');
    }
}
