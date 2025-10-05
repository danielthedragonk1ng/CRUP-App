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
        Schema::table('dosens', function (Blueprint $table) {
            if (!Schema::hasColumn('dosens', 'nama')) {
                $table->string('nama')->after('id');
            }
            if (!Schema::hasColumn('dosens', 'email')) {
                $table->string('email')->unique()->nullable()->after('nama');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dosens', function (Blueprint $table) {
            if (Schema::hasColumn('dosens', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('dosens', 'nama')) {
                $table->dropColumn('nama');
            }
        });
    }
};