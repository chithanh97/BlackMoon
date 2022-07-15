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
    		$table->text('title')->nullable();
    		$table->text('name')->nullable();
    		$table->text('slug')->nullable();
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
