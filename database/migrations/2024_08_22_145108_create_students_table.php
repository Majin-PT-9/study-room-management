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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->float('hourly_price')->nullable();
            $table->string('nif')->nullable();
            $table->string('address')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->unsignedBigInteger('assembly_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('assembly_id')->references('id')->on('assemblies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
