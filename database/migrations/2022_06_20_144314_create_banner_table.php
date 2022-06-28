<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('banner', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('name');
    		$table->string('type');
    		$table->string('image')->nullable();
    		$table->string('link')->nullable();
    		$table->integer('status');
    		$table->integer('lang');
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
    	Schema::dropIfExists('banner');
    }
  };
