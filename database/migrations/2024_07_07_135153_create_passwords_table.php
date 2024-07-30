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
        Schema::create('passwords', function (Blueprint $table) {
            $table->id();
            // If we have a user that got deleted, the listings will also be dropped
            $table->foreignId('user_id')->constrained()
            ->onDelete('cascade');
            $table->string('platform_name');
            $table->string('platform_url');
            // $table->longText('platform_description');
            // $table->longText('platform_description')->nullable();
            $table->string('platform_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passwords');
    }
};
