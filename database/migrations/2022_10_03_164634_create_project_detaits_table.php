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
        Schema::create('project_detaits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->string('image');
            $table->string('architect');
            $table->string('location');
            $table->integer('size');
            $table->integer('year');
            $table->foreignId('project_id');
            $table->foreignId('client_id');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_detaits');
    }
};
