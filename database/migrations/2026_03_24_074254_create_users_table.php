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
            $table->string('email')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->string('password')->nullable(); 
            $table->string('role'); 
            $table->rememberToken()->nullable(); 
            $table->string('facebook_id')->nullable(); 
            $table->string('google_id')->nullable(); 
            $table->string('github_id')->nullable();
            $table->string('contact_name')->nullable(); 
            $table->string('company_name')->nullable(); 
            $table->tinyInteger('enable_portal')->nullable();
            $table->integer('currency_id')->nullable(); 
            $table->integer('company_id')->nullable(); 
            $table->integer('creator_id')->nullable(); 
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
