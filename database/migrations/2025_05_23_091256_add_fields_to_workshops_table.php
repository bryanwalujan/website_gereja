<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->string('youtube_link')->nullable()->after('speaker_photo');
            $table->integer('participant_count')->default(0)->after('youtube_link');
            $table->integer('max_participants')->nullable()->after('participant_count');
            $table->string('material_file')->nullable()->after('max_participants');
            $table->date('start_date')->nullable()->after('material_file');
            $table->date('end_date')->nullable()->after('start_date');
            $table->time('start_time')->nullable()->after('end_date');
            $table->time('end_time')->nullable()->after('start_time');
        });
    }

    public function down(): void
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->dropColumn([
                'youtube_link',
                'participant_count',
                'max_participants',
                'material_file',
                'start_date',
                'end_date',
                'start_time',
                'end_time',
            ]);
        });
    }
};