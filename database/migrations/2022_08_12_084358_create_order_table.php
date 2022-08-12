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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->text('order_code')->nullable();
            $table->text('province')->nullable();
            $table->text('district')->nullable();
            $table->text('ward')->nullable();
            $table->text('ship');
            $table->text('name');
            $table->text('phone');
            $table->text('email')->nullable();
            $table->text('address');
            $table->text('note')->nullable();
            $table->text('total');
            $table->integer('status');
            $table->text('pay_method');
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
        Schema::dropIfExists('order');
    }
};
