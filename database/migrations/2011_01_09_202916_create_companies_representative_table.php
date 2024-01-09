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
        Schema::create('companies_representative', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('email')->nullable();
            $table->string('phone1');
            $table->string('phone2');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies_representative');
    }
};
