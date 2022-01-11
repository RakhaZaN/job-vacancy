<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->date('dob')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('provincy', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('post_code', 10)->nullable();
            $table->string('we_title', 50)->nullable();
            $table->string('we_company', 100)->nullable();
            $table->date('we_from')->nullable();
            $table->date('we_to')->nullable();
            $table->string('we_description', 255)->nullable();
            $table->enum('we_job_level', ['director', 'senior', 'supervisor', 'officer', 'entry'])->nullable();
            $table->string('edu_level', 50)->nullable();
            $table->string('edu_degree', 10)->nullable();
            $table->string('edu_school', 100)->nullable();
            $table->string('edu_major', 100)->nullable();
            $table->date('edu_start')->nullable();
            $table->date('edu_end')->nullable();
            $table->text('skills')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_detail');
    }
}
