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
        Schema::table('donations', function (Blueprint $table) {
            // Remove a foreign key constraint
            $table->dropForeign(['user_id']);
            
            // Torna a coluna nullable
            $table->unsignedBigInteger('user_id')->nullable()->change();
            
            // Recria a foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            // Remove a foreign key constraint
            $table->dropForeign(['user_id']);
            
            // Torna a coluna não nullable novamente
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            
            // Recria a foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
