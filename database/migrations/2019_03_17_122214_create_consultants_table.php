<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('admin_id')->nullable();
            $table->text('feedback')->nullable();
            $table->string('monthly_cost')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('Compeletion_duration')->nullable();
            $table->enum('language',['ar','en','both'])->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->mediumText('message');
            $table->enum('quotation_type',['facebook', 'instagram' ,'seo' ,'Web_site' ,'mobile_app','mobile_application']);
            $table->string('quotation_code');
            $table->string('approval');
            $table->integer('seen');
            $table->integer('forward');
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
        Schema::dropIfExists('consultants');
    }
}
