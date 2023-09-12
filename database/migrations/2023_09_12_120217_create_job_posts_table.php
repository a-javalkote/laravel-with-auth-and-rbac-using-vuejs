<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('post_icon');
            $table->string('title');
            $table->string('location');
            $table->date('post_date');
            $table->string('experience');
            $table->string('work_level');
            $table->string('employee_type');
            $table->string('offer_salary');
            $table->mediumText('job_description');
            $table->mediumText('skill_experience');
            $table->mediumText('duties_responsibilities');
            $table->date('last_date');
            $table->string('total_applicant');
            $table->string('uploaded_by');
            $table->date('updated_date');
            $table->string('updated_by');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
