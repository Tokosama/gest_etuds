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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id(); 
            $table->integer('numero_etudiant'); 
            $table->string('nom'); 
            $table->string('prenom'); 
            $table->enum('niveau', ['L1', 'L2', 'L3']); // Niveau (Licence 1, 2, 3)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');

    }
};
