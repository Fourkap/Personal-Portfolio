<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_skills', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('skill_id')->references('id')->on('skills');
            $table->primary('project_id', 'skill_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_skills');
    }
}
