<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            // $table->enum('home', array('0', '1'));
            // $table->enum('about', array('0', '1'));
            // $table->enum('services', array('0', '1'));
            // $table->enum('portfolio', array('0', '1'));
            // $table->enum('videos', array('0', '1'));
            // $table->enum('blog', array('0', '1'));
            // $table->enum('contact', array('0', '1'));

            $table->string('home')->nullable();
            $table->string('about')->nullable();
            $table->string('services')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('videos')->nullable();
            $table->string('blog')->nullable();
            $table->string('contact')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
