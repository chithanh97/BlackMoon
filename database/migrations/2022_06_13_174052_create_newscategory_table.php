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
    	Schema::create('newscategory', function (Blueprint $table) {
    		$table->increments('id');
    		$table->text('name');
    		$table->text('subject');
    		$table->text('parent');
    		$table->text('detail')->nullable();
    		$table->text('detail_short')->nullable();
    		$table->text('image')->nullable();
    		$table->text('link')->nullable();
    		$table->integer('sort')->nullable();
    		$table->integer('hot')->nullable();
    		$table->integer('status');
    		$table->text('title')->nullable();
    		$table->text('description')->nullable();
    		$table->text('keyword')->nullable();
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
