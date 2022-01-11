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
            $table->date('active_date')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('major', 100)->nullable();
            $table->enum('employment_type', ['contract', 'regular'])->nullable();
            $table->string('education_level', 10)->nullable();
            $table->enum('position_level', ['director', 'senior', 'supervisor', 'officer', 'entry'])->nullable();
            $table->string('range_age', 10)->nullable();
            $table->longText('description')->nullable();
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
