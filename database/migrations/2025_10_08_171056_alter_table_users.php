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
        Schema::table('users',function(Blueprint $table){
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('cpf',50)->nullable();
            $table->string('phone',20)->nullable();
          
            $table->unsignedBigInteger('rule_id')->default(3);// Deixa o usuario como User por padrão
            $table->unsignedBigInteger('institution_id');
            $table->unsignedBigInteger('address_id')->unique()->nullable();

            $table->foreign('rule_id')->references('id')->on('rules');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('institution_id')->references('id')->on('institutions');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
    
            $table->dropForeign(['rule_id']);
            $table->dropForeign(['institution_id']);

            $table->dropColumn([
                'avatar',
                'is_active',
                'phone',
                'adress_city',
                'adress_state',
                'adress_zip',
                'rule_id',
                'institution_id',
            ]);
        });
    }   
};
