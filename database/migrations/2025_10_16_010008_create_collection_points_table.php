<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('collection_points', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_point_id')->constrained('collection_points')->onDelete('cascade');
            $table->string('dia');
            $table->time('abertura')->nullable();
            $table->time('fechamento')->nullable();
            $table->timestamps();
        });

        Schema::create('campaign_collection_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_point_id')->constrained('collection_points')->onDelete('cascade');
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_collection_points');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('collection_points');
    }
};
