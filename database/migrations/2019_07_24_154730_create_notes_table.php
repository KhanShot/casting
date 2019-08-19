<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            $table->integer('page_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('rezh_rate')->nullable()->default(0);
            $table->integer('produser_rate')->nullable()->default(0);
            $table->integer('client_rate')->nullable()->default(0);
            $table->text('comment')->nullable();
            $table->integer('admin_rate')->nullable()->default(0);
            $table->text('admin_comment')->nullable();
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
        Schema::dropIfExists('notes');
    }
}
