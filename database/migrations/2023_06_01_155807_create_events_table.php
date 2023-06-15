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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->timestamps();
            $table->string('title', 255);
            $table->string('datetime_start', 50);
            $table->string('datetime_end', 50);
            $table->string('location', 255);
            $table->string('price', 10);
            $table->string('price_member', 10);
            $table->text('description');
            $table->boolean('public');
            $table->string('tag_province', 100);
            $table->string('tag_subject', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
