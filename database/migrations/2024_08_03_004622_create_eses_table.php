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
        Schema::create('eses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('Name');
            $table->String('phone');
            $table->String('Place');
            $table->String('Email');
            $table->String('logo');
            $table->String('Domaine');
            $table->String('passwrod');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eses');
    }
};
