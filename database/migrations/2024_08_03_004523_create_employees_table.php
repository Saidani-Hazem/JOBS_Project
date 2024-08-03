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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('FullName');
            $table->String('Email')->unique();
            $table->String('JobTitle');
            $table->String('Phone')->nullable();
            $table->String('Country');
            $table->String('Pic')->nullable();
            $table->String('PassWord');
            $table->String('Description')->nullable();
            $table->String('Hash_One')->nullable();
            $table->String('Hash_Tow')->nullable();
            $table->String('Hash_Three')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
