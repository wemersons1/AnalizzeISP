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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('cpf')->nullable();
            $table->string('password')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone1')->nullable();

            $table->dateTime('accession_date')->nullable();
            $table->longText('description')->nullable();

            $table->unsignedBigInteger('registered_by')->nullable();
            $table->foreign('registered_by')->references('id')->on('users');
 
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('users_statuses');

            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('users_genders');

            $table->unique(['company_id', 'email', 'cpf'])->unique();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
