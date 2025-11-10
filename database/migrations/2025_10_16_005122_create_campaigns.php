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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->string('phone',20);
            $table->string('legend_phone',100);
            $table->boolean('is_active')->default(false);
            $table->dateTime('beginning');
            $table->dateTime('termination');
            $table->float('mark')->nullable();
            $table->string('unit',10);

            $table->unsignedBigInteger('institution_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
