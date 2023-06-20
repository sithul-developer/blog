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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->string('image');
            $table->string('category_id');
            $table->string('content');
            $table->tinyInteger('option')->comment('0:left,1:right')->default(0);
            $table->integer('orders');
            $table->tinyInteger('status')->comment('0:active,1:inactive')->default(0);
            $table->tinyInteger('Is_deleted')->comment('0:not delete ,1:delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
