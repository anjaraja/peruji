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
        Schema::table('membership', function (Blueprint $table) {
            $table->date('dob')->nullable()->change();
            $table->string('funct')->nullable()->after("website");
            $table->string('department')->nullable()->after("funct");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
