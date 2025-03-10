<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOffersTable extends Migration
{
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->decimal('salary_min', 8, 2)->nullable();
            $table->decimal('salary_max', 8, 2)->nullable();
            $table->string('keywords')->nullable();
            $table->timestamp('expires_at');
            $table->string('status')->default('pending'); // pending, publish, rejected
            $table->string('location')->nullable();
            $table->string('contract_type')->nullable(); // internship, full-time, part-time
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_offers');
    }
}
