<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('category')->nullable();
            $table->string('isbn')->nullable();
            $table->string('editorial')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('pages')->default(1);
            $table->integer('status')->default(1);
            $table->string('course')->nullable();
            $table->string('level')->nullable();
            $table->string('grado')->nullable();
            $table->unsignedBigInteger('grado_id');
            $table->unsignedBigInteger('sede_id');
            $table->timestamps();
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
