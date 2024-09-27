<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('active')->default(1);
            $table->unsignedBigInteger('grado_id')->nullable();
            $table->string('ordinal')->nullable();
            $table->string('level')->nullable();
            $table->string('grado')->nullable();
            $table->string('name');
            $table->string('subtitle')->nullable();
              $table->text('description')->nullable();
              $table->enum('status', [Course::BORRADOR, Course::REVISION, Course::PUBLICADO])->default(Course::BORRADOR);
            $table->string('slug');
            $table->timestamps();

            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('set null');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
