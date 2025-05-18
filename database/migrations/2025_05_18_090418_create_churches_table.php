<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('region', ['Sumatra dan Kalimantan', 'Jawa', 'Sulawesi dan Papua']);
            $table->text('about_us')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('church_image');
            $table->string('pastor_image');
            $table->text('address')->nullable();
            $table->text('maps')->nullable(); // Untuk menyimpan embed code atau URL Google Maps
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->text('worship_schedule')->nullable(); // Jadwal ibadah dalam format teks
            $table->integer('student_target')->nullable(); // Target murid/tahun ke depan
            $table->integer('congregation_count')->nullable(); // Jumlah jemaat
            $table->text('prayer_points')->nullable(); // Doa pokok
            $table->year('established_year')->nullable(); // Tahun berdiri
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('churches');
    }
};