<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('churches', function (Blueprint $table) {
            $table->string('pastor_name')->nullable()->after('pastor_image');
        });
    }

    public function down(): void
    {
        Schema::table('churches', function (Blueprint $table) {
            $table->dropColumn('pastor_name');
        });
    }
};