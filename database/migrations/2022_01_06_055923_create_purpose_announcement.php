<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurposeAnnouncement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purpose_job', function (Blueprint $table) {
            $table->dropColumn('announcement');
        });

        Schema::create('purpose_announcement', function (Blueprint $table) {
            $table->unsignedBigInteger('purpose_job_id')->primary();
            $table->string('title', 255);
            $table->text('announcement');
            $table->date('date');
            $table->timestamps();

            $table->foreign('purpose_job_id')->references('id')->on('purpose_job')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purpose_announcement');
    }
}
