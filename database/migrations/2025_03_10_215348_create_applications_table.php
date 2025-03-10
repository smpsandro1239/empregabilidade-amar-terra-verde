<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_offer_id');
            $table->text('message')->nullable();
            $table->string('resume_file_path')->nullable();
            $table->timestamp('applied_at')->useCurrent();
            $table->string('status')->default('pending'); // pending, accepted, rejected
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_offer_id')->references('id')->on('job_offers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
