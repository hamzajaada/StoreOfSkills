<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // les champs de la table offres
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('categorie');
            $table->text('offre');
            $table->string('image_offre');
            $table->float('prix');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
