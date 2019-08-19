<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCastingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('casting_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullabe();
            $table->string('surname')->nullabe();
            $table->string('fathersname')->nullabe();
            $table->string('model_type')->nullabe();
            $table->string('email')->nullabe();
            $table->string('social_acc')->nullabe();
            $table->string('city')->nullabe();
            $table->string('address')->nullabe();
            $table->string('gender')->nullabe();
            $table->string('phone')->nullabe();
            $table->string('pasport')->nullabe();
            $table->string('can_go_abroad')->nullabe();
            $table->integer('age')->nullabe();
            $table->integer('height')->nullabe();
            $table->integer('weight')->nullabe();
            $table->string('body')->nullabe();
            $table->string('clothes_size')->nullabe();
            $table->integer('foot_size')->nullabe();
            $table->string('appearance')->nullabe();
            $table->string('color_hair')->nullabe();
            $table->string('color_eyes')->nullabe();
            $table->string('profession')->nullabe();
            $table->string('food_prefer')->nullabe()->default("нет");
            $table->string('allergy')->nullabe()->default("нет");
            $table->string('illness')->nullabe()->default("нет");
            $table->string('current_work')->nullabe();
            $table->text('skill_sport')->nullabe();
            $table->text('skill_fight_art')->nullabe();
            $table->text('skill_dance')->nullabe();
            $table->text('skill_instrumental')->nullabe();
            $table->string('skill_vocal')->nullabe();
            $table->text('skill_car_ride')->nullabe();
            $table->string('skill_horse_ride')->nullabe();
            $table->string('skill_else')->nullabe()->default("НЕТ");
            $table->text('languages')->nullabe();
            $table->string('job_experience_tv')->nullabe()->default("НЕТ");
            $table->string('job_experience_teatr')->nullabe()->default("НЕТ");
            $table->text('about_you')->nullabe()->default("");
            $table->string('can_naked')->nullabe();
            $table->text('have_work')->nullabe()->default("НЕТ");
            $table->text('will_work')->nullabe()->default("НЕТ");
            $table->date('fill_date')->nullabe();
            $table->text('images')->nullabe();
            $table->text('videos')->nullabe();
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
        Schema::dropIfExists('casting_models');
    }
}
