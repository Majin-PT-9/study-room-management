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
            Schema::table('students', function (Blueprint $table) {
                $table->string('slug')->unique()->after('last_name'); // Adjust the 'after' clause based on your schema
            });
            Schema::table('assemblies', function (Blueprint $table) {
                $table->string('slug')->unique()->after('name'); // Adjust the 'after' clause based on your schema
            });
            Schema::table('users', function (Blueprint $table) {
                $table->string('slug')->unique()->after('name'); // Adjust the 'after' clause based on your schema
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
};
