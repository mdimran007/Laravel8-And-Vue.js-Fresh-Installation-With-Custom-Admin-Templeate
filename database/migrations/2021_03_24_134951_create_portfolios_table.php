<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->nullable();
            $table->string('category_id')->nullable();
            $table->string('images')->nullable();
            $table->string('banner')->nullable();
            $table->string('title')->nullable();
            $table->longText('desc')->nullable();
            $table->string('url')->nullable();
            $table->enum('status', array('Published', 'Unpublished'));
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
        Schema::dropIfExists('portfolios');
    }
}
