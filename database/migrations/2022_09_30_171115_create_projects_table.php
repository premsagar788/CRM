<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('client')->unsigned();
            $table->unsignedSmallInteger('phone')->unsigned();
            $table->enum('billing_type', ['Fixed Rate', 'Project Hours', 'Task Hours']);
            $table->enum('status', ['On Hold', 'Not Started', 'In Progress', 'Finished', 'Cancelled']);
            $table->string('estimated_time', 11);
            $table->date('start_date');
            $table->date('deadline');
            $table->longText('description');

            $table->foreign('client')->references('id')->on('clients');
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
