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
        Schema::table('planets', function (Blueprint $table) {
            $table->string('distance_fr')->change();
            $table->string('duree_fr')->change();
            $table->string('distance_en')->change();
            $table->string('duree_en')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planets', function (Blueprint $table) {
            $table->mediumInteger('distance_fr')->change();
            $table->tinyInteger('duree_fr')->change();
            $table->mediumInteger('distance_en')->change();
            $table->tinyInteger('duree_en')->change();
        });
    }
};
