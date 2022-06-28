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
    	Schema::create('itemcategory', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('name');
    		$table->string('subject');
    		$table->string('parent');
    		$table->string('detail')->nullable();
    		$table->string('detail_short')->nullable();
    		$table->string('image')->nullable();
    		$table->string('link')->nullable();
    		$table->integer('sort')->nullable();
    		$table->integer('hot')->nullable();
    		$table->integer('status');
    		$table->string('title')->nullable();
    		$table->string('description')->nullable();
    		$table->string('keyword')->nullable();
    		$table->integer('lang');
    		// $table->collation = 'utf8_general_ci';
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
    	Schema::dropIfExists('itemcategory');
    }
  };
