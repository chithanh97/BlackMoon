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
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('logo')->nullable();
            $table->text('favicon')->nullable();
            $table->text('domain')->nullable();
            $table->text('monney')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keyword')->nullable();
            $table->text('ua')->nullable();
            $table->text('pixcel')->nullable();
            $table->text('ga')->nullable();
            $table->text('mailserver')->nullable();
            $table->text('passserver')->nullable();
            $table->text('certificate')->nullable();
            $table->text('phone')->nullable();
            $table->text('hotline')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->text('headcode')->nullable();
            $table->text('bodycode')->nullable();
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
        Schema::dropIfExists('config');
    }
};
