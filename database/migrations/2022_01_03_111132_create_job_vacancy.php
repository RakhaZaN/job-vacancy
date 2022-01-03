<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobVacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('job_type')->cascadeOnDelete();
            $table->string('title', 50);
            $table->date('active_date');
            $table->string('location', 255);
            $table->string('major', 100);
            $table->enum('employment_type', ['contract', 'regular']);
            $table->enum('education_level', ['d1', 'd2', 'd3', 'd4', 's1', 's2', 's3'])->nullable();
            $table->enum('position_level', ['director', 'senior', 'supervisor', 'officer', 'entry']);
            $table->string('range_age', 10);
            $table->text('requirements')->nullable();
            $table->text('responsibilities')->nullable();
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
        Schema::dropIfExists('job_vacancy');
    }
}
