<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            if (Schema::hasColumn('donations', 'institution_id')) {
                $table->dropForeign(['institution_id']);
                $table->dropColumn('institution_id');
            }

            $table->foreignId('campaign_id')
                ->after('user_id')
                ->constrained('campaigns')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
            $table->dropColumn('campaign_id');

            $table->foreignId('institution_id')
                ->after('user_id')
                ->constrained()
                ->cascadeOnDelete();
        });
    }
};

