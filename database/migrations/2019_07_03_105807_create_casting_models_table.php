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
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('fathersname')->nullable();
            $table->string('model_type')->nullable();
            $table->string('email')->nullable();
            $table->text('admin_comment')->nullable();
            $table->text('social_acc')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('pasport')->nullable();
            $table->string('can_go_abroad')->nullable();
            $table->integer('age')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('body')->nullable();
            $table->string('clothes_size')->nullable();
            $table->integer('foot_size')->nullable();
            $table->string('appearance')->nullable();
            $table->string('color_hair')->nullable();
            $table->string('color_eyes')->nullable();
            $table->string('profession')->nullable();
            $table->string('food_prefer')->nullable()->default("нет");
            $table->string('allergy')->nullable()->default("нет");
            $table->string('illness')->nullable()->default("нет");
            $table->string('current_work')->nullable();
            $table->text('skill_sport')->nullable();
            $table->text('skill_fight_art')->nullable();
            $table->text('skill_dance')->nullable();
            $table->text('skill_instrumental')->nullable();
            $table->string('skill_vocal')->nullable();
            $table->text('skill_car_ride')->nullable();
            $table->string('skill_horse_ride')->nullable();
            $table->string('skill_else')->nullable()->default("нет");
            $table->text('languages')->nullable();
            $table->string('job_experience_tv')->nullable()->default("нет");
            $table->string('job_experience_teatr')->nullable()->default("нет");
            $table->text('about_you')->nullable();
            $table->string('can_naked')->nullable();
            $table->string('have_work')->default("нет");
            $table->string('will_work')->default("нет");
            $table->date('fill_date')->nullable();
            $table->text('images')->nullable()->default('default.jpg');
            $table->text('videos')->nullable();
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
