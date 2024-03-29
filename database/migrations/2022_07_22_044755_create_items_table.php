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
    	Schema::create('items', function (Blueprint $table) {
    		$table->increments('id');
    		$table->text('name');
    		$table->text('subject');
    		$table->text('parent');
    		$table->text('detail')->nullable();
    		$table->text('detail_short')->nullable();
    		$table->text('image')->nullable();
    		$table->text('image_child')->nullable();
    		$table->text('link')->nullable();
    		$table->text('price')->nullable();
    		$table->text('sell_price')->nullable();
    		$table->text('sell_percent')->nullable();
    		$table->integer('sort')->nullable();
    		$table->integer('hot')->nullable();
    		$table->integer('view')->nullable();
    		$table->integer('buy')->nullable();
    		$table->integer('status');
    		$table->text('title')->nullable();
    		$table->text('description')->nullable();
    		$table->text('keyword')->nullable();
    		$table->integer('lang');
    		$table->timestamps();
    		DB::statement('ALTER TABLE items ADD FULLTEXT `search` (`name`, `detail`)');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists('items');
    }
  };
