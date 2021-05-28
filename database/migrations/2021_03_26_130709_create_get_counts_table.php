<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_counts', function (Blueprint $table) {
            $table->id();
            $table->string('get_award')->nullable();
            $table->string('research_paper')->nullable();
            $table->string('project_done')->nullable();
            $table->string('happy_clients')->nullable();
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
        Schema::dropIfExists('get_counts');
    }
}
