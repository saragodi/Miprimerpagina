<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');

            $table->string('company')->nullable();
            $table->string('location')->nullable();
            $table->string('state')->nullable();
            $table->boolean('status')->default(true);


            $table->string('type');
            $table->string('experience')->nullable();
            $table->string('modality')->nullable();

            $table->longText('preview')->nullable();
            $table->longText('about')->nullable();


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
        Schema::dropIfExists('jobs');
    }
}
