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
       Schema::create('collection_points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('beginning');
            $table->dateTime('termination');
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->timestamps();
        });

        Schema::create('addresses_collection_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_point_id');
            $table->unsignedInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('collection_point_id')->references('id')->on('unit_measurements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_points');
        Schema::dropIfExists('addresses_collection_points');
    }
};
