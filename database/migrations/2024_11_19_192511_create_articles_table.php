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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('designation',100)->unique();
            $table->string('marque',50)->nullable();
            $table->string('reference',50)->index();
            $table->integer('qtestock')->unsigned();
            $table->decimal('prix',8,2);
            // Image avec limite de taille (255 caractères)
            $table->string('imageart', 255)->nullable();
            $table->unsignedBigInteger('scategorieID');
            // Définition de la clé étrangère avec contrainte onDelete restrict
            $table->foreign('scategorieID')
                    ->references('id')
                    ->on('scategories')
                    ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
