<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lectivos', function (Blueprint $table) {
            $table->id();
            //periodo
            $table->date('start')->default(Carbon::now());
            $table->date('end')->default(Carbon::now());
            $table->integer('year')->default(Carbon::now()->year);
            ///Grado register
            $table->unsignedBigInteger('periodo_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('grado_id');
            $table->string('ordinal');
            $table->string('grado_name');
            $table->string('level');
           $table->integer('numero')->default(1);
            $table->string('letra')->default('A');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectivos');
    }
};
