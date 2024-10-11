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
        Schema::create('pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('category')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('pages')->default(1);
            $table->integer('status')->default(1);
            $table->string('course')->nullable();
            $table->string('level')->nullable();
            $table->string('grado')->nullable();
            $table->string('extension')->default('pdf');
            $table->string('url');
            $table->unsignedBigInteger('grado_id')->nullable();
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdfs');
    }
};
