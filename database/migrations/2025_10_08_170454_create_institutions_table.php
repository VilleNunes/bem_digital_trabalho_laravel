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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('fantasy_name',100);
            $table->string('cnpj',50);
            $table->string('phone',20);
            $table->string('email')->unique();
            $table->boolean('is_active')->default(false);
            $table->string('adress_city');
            $table->string('adress_state');
            $table->string('adress_zip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
