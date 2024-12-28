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
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); 
            $table->integer('etudiant_id'); 
            $table->integer('ec_id'); 
            $table->string('note'); 
            $table->string('session'); 
            $table->date('date_evaluation')->default(now()); // Définir une valeur par défaut
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');

    }
};


