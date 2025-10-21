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
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fr', 50);
            $table->string('description_fr', 250);
            $table->mediumInteger('distance_fr');
            $table->tinyInteger('duree_fr');
            $table->string('nom_en', 50);
            $table->string('description_en', 250);
            $table->mediumInteger('distance_en');
            $table->tinyInteger('duree_en');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planets');
    }
};
