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
            $table->integer('admin_id');
            $table->text('feedback');
            $table->string('monthly_cost');
            $table->string('total_cost');
            $table->string('Compeletion_duration');
            $table->enum('language',['ar','en','both']);
            $table->string('name');
            $table->string('email_booking');
            $table->string('phone');
            $table->mediumText('message');
            $table->enum('quotation_type',['facebook', 'instagram' ,'seo' ,'Web_site' ,'mobile_app','mobile_application']);
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
