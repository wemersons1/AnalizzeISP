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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('corporate_name')->nullable();
            $table->string('fantasy_name')->nullable();
            $table->string('document')->nullable();//cpf ou cnpj
            $table->string('email')->nullable();
            $table->string('description')->nullable();
            $table->string('phone1');
            $table->string('phone2');
            $table->unsignedBigInteger('representative_id')->nullable();
            $table->foreign('representative_id')->references('id')->on('companies_representative');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
    
};
