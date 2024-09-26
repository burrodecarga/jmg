<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->after('name')->default('no registrada');
            $table->string('phone')->nullable()->after('name')->default('000-000.000');
            $table->string('gender')->nullable()->after('name')->default('masculino');;
            $table->date('birthdate')->nullable()->after('name')->default(Carbon::now());
            $table->string('rol')->nullable()->after('name')->default('no role');
            $table->unsignedBigInteger('confirmed')->nullable()->after('name')->default(0);
            $table->unsignedBigInteger('active')->nullable()->after('name')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable()->after('name');
            $table->unsignedBigInteger('cedula')->nullable()->after('name')->default(0);
            $table->string('last_name')->nullable()->after('name');
            $table->foreign('parent_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('birthdate');
            $table->dropColumn('rol')->default('no role');
            $table->dropColumn('confirmed');
            $table->dropColumn('active');
            $table->dropColumn('cedula');
            //$table->dropColumn('parent_id');
            $table->dropColumn('last_name');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
