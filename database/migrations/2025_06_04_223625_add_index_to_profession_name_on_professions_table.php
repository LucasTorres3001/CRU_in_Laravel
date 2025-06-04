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
        Schema::table('professions', function (Blueprint $table) {
            $table->index(['profession_name', 'salary']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profession_name_on_professions', function (Blueprint $table) {
            $table->dropIndex(['profession_name', 'salary']);
        });
    }
};
