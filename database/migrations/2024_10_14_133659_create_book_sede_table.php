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
        Schema::create('book_sede', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('book_id');
            $table->integer('cantidad')->default(0);
            $table->foreign('book_id')->references('id')->on('books')
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
        Schema::dropIfExists('book_sede');
    }
};
