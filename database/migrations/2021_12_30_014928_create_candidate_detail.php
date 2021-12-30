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
            $table->date('dob');
            $table->enum('gender', ['M', 'F']);
            $table->string('address', 255);
            $table->string('phone', 20);
            $table->string('country', 100);
            $table->string('provincy', 100);
            $table->string('city', 100);
            $table->string('post_code', 10);
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
