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
        Schema::create('applieds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('emp_id');
            $table->foreignId('job_id');
            $table->foreign('emp_id')->references('id')->on('employees');
            $table->foreign('job_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applieds');
    }
};
