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
        Schema::create('sedes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            //$table->unsignedBigInteger('user_id')->default(1);
            $table->integer('numero')->default(1);
            $table->string('name');
            $table->string('slug');
            $table->string('nit');
            $table->string('dane');
            $table->string('address');
            $table->string('department')->nullable();
            $table->string('municipality')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell')->nullable();
            $table->string('sector')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('user_id')->references('id')->on('users')
            //     ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};
