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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_code')->unique();
            $table->string('title');
            $table->string('teacher_comments')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->date('day')->nullable();  // Assuming the day can be optional
            $table->time('starts_at');
            $table->time('ends_at');
            $table->boolean('active');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
