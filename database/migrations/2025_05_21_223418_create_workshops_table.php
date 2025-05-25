<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('church_id')->constrained()->onDelete('cascade');
            $table->string('region')->index();
            $table->string('location');
            $table->date('date');
            $table->string('speaker');
            $table->string('topic');
            $table->string('speaker_photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};