<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurposeJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purpose_job', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_detail_id')->constrained('candidate_detail', 'user_id')->cascadeOnDelete();
            $table->foreignId('job_vacancy_id')->constrained('job_vacancy')->cascadeOnDelete();
            $table->date('date');
            $table->enum('status', ['send', 'confirmed', 'rejected'])->default('send');
            $table->string('file_attach', 255);
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
        Schema::dropIfExists('purpose_job');
    }
}
