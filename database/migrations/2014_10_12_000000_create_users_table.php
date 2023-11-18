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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->foreignId('country_id');
            $table->enum('gender', ["male", "female"]);
            $table->date('birthdate');
            $table->string('password');
            $table->enum('type',["user", "admin"]);
            $table->enum('status', ["active", "block", "ban"])->default("active");
            $table->string('token', 500);
            $table->string('code')->nullable();
            $table->enum('is_reset',["no","yes"]);
            $table->string('profile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
