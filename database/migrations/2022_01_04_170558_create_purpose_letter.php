<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurposeLetter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purpose_letter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('is_intern')->default(0);
            $table->string('we_title', 50)->nullable();
            $table->string('we_company', 100)->nullable();
            $table->date('we_from')->nullable();
            $table->date('we_to')->nullable();
            $table->string('we_description', 255)->nullable();
            $table->enum('we_job_level', ['director', 'senior', 'supervisor', 'officer', 'entry'])->nullable();
            $table->string('edu_level', 50);
            $table->enum('edu_degree', ['d1', 'd2', 'd3', 'd4', 's1', 's2', 's3'])->nullable();
            $table->string('edu_school', 100);
            $table->string('edu_major', 100);
            $table->date('edu_start')->nullable();
            $table->date('edu_end')->nullable();
            $table->string('file_attach', 255);
            $table->timestamps();

            $table->unique(['user_id', 'is_intern']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purpose_letter');
    }
}
