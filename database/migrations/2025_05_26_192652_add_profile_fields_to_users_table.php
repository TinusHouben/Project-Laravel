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
        Schema::table('users', function (Blueprint $table) {
            // Voeg de nieuwe velden toe
            $table->string('username')->nullable()->unique();  // Username veld
            $table->date('birthday')->nullable();  // Verjaardag
            $table->text('about_me')->nullable();  // Over mij tekst
            $table->string('profile_picture')->nullable();  // Profielfoto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Verwijder de toegevoegde kolommen als de migratie wordt teruggedraaid
            $table->dropColumn(['username', 'birthday', 'about_me', 'profile_picture']);
        });
    }
};
