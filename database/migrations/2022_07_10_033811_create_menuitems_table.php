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
    	Schema::create('menuitems', function (Blueprint $table) {
    		$table->increments('id');
    		$table->text('title');
    		$table->text('name');
    		$table->text('slug');
    		$table->text('type');
    		$table->text('target');
    		$table->integer('menu_id');
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
    	Schema::dropIfExists('menuitems');
    }
  };