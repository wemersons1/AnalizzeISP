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
        Schema::create('users_address', function (Blueprint $table) {
            $table->id();

            $table->string('street');

            $table->string('neighborhood');

            $table->string('zip_code');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedBigInteger('address_types_id');
            $table->foreign('address_types_id')->references('id')->on('address_types');

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

        Schema::dropIfExists('users_address');
    }
};
