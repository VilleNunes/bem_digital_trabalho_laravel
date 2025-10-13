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

         Schema::create('addresses',function (Blueprint $table){
            $table->id();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('zip',100)->nullable();
            $table->string('road',100)->nullable();
            $table->string('neighborhood',100)->nullable();
            $table->string('complement',100)->nullable();
            $table->string('number',100)->nullable();
            $table->timestamps();
        });

        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('fantasy_name',100);
            $table->string('cnpj',50);
            $table->string('phone',20);
            $table->string('email')->unique();
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('address_id')->nullable()->unique();
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('institutions');
    }
};
