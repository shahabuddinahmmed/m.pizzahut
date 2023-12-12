<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->string('experience_info');
            $table->string('customer_name');
            $table->string('gender')->nullable();
            $table->string('email');
            $table->string('mobile_no')->nullable();
            $table->string('contact_time')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->text('restaurant_address')->nullable();
            $table->date('date_of_visit')->nullable();
            $table->string('time_of_visit')->nullable();
            $table->text('feedback')->nullable();
            $table->string('how_often_u_visit')->nullable();
            $table->text('image1')->nullable();
            $table->text('image2')->nullable();
            $table->string('security_question')->nullable();
            $table->string('restaurant_clean','3')->nullable();
            $table->string('service_hospitable','3')->nullable();
            $table->string('receive_ordered','3')->nullable();
            $table->string('restaurant_maintained',3)->nullable();
            $table->string('food_liking',3)->nullable();
            $table->string('served_speedily',3)->nullable();
            $table->string('value_for_money',3)->nullable();
            $table->string('visit_again',3)->nullable();
            $table->string('feedback_about')->nullable();
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
        Schema::dropIfExists('feedback');
    }
}
