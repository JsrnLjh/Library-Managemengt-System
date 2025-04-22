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
        Schema::table('books', function (Blueprint $table) {
            $table->foriegnId('genre_id')->nullable()->constrained()->nullOnDelete();
            $table->foriegnId('subject_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('availability', ['available', 'checked_out', 'on_hold', 'in_processing'])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
        });
    }
};
