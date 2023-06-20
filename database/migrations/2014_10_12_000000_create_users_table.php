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
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('confirm_password')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('image')->nullable();
            $table->string('dashboard')->nullable();
            $table->string('category')->nullable();
            $table->string('tag')->nullable();
            $table->string('slider')->nullable();
            $table->string('post')->nullable();
            $table->string('footer')->nullable();
            $table->string('preview')->nullable();
            $table->string('gallery')->nullable();
            $table->string('setting')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('status')->comment('0:active,1:inactive')->default(0);
            $table->tinyInteger('Is_deleted')->comment('0:not delete ,1:deleted')->default(0);
            $table->tinyInteger('is_admin')->comment('0:user,1:admin,2:other')->default(1);
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
