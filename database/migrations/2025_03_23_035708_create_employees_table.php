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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('surname',255);
            $table->string('cpf',199)->unique('cpf');
            $table->string('gender',100)->nullable(true);
            $table->string('ethnicity',100)->nullable(true);
            $table->dateTime('date_of_birth')->nullable(true);
            $table->string('slug',255);
            $table->text('about_me')->nullable(true);
            $table->foreignId('id_birthplace')->constrained('locations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_workplace')->constrained('locations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_profession')->constrained('professions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
