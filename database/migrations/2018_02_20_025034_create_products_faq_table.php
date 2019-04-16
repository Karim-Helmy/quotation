<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_faq', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->integer('language_id')->references('languages')->on('id');
            $table->text('question');
            $table->text('answer');
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
        Schema::drop('products_faq');
    }
}
