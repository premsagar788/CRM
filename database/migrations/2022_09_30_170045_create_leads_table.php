<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company_name');
            $table->string('source');
            $table->enum('status', ['Attempted', 'Contacted', 'In Progress', 'Interested', 'New Opportunity']);
            $table->float('budget', 8, 2);
            $table->string('website')->nullable();
            $table->unsignedBigInteger('phone')->unsigned();
            $table->string('country')->nullable();
            $table->longText('description');
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
        Schema::dropIfExists('leads');
    }
}
