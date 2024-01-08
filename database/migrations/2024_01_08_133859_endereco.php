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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();

            $table->string('rua');

            $table->string('bairro');

            $table->string('CEP');

            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedBigInteger('tipo_endereco_id');
            $table->foreign('tipo_endereco_id')->references('id')->on('tipo_endereco');

            $table->unsignedInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states');

            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*Schema::table('endereco', function (Blueprint $table) {
            $table->dropForeign('tipo_endereco_tipo_endereco_id_foreign');
        });*/

        Schema::dropIfExists('endereco');
    }
};
