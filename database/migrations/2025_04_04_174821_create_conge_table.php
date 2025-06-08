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
        Schema::create('conge', function (Blueprint $table) {
            $table->id('idConge');
            $table->foreignId('employe_id')->constrained('employe', 'id')->onDelete('cascade');
            $table->string('type_conge');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('document_justification')->nullable();
            $table->enum('statut', ['En attente', 'Approuvé', 'Rejeté'])->default('En attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conge');
    }
};
