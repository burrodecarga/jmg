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
        Schema::create('grado_sede', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grado_id');
            $table->unsignedBigInteger('sede_id');
            $table->integer('numero')->default(1);
            $table->string('letra')->default('A');
            $table->foreign('grado_id')->references('id')->on('grados')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sede_id')->references('id')->on('sedes')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grado_sede');
    }
};
