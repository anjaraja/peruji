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
        Schema::table('contactus', function (Blueprint $table) {
            $table->integer('emailstatus')->length(1)->default(0)->change();
        });
        Schema::table('emailadmin', function (Blueprint $table) {
            $table->integer('activestatus')->length(1)->default(1)->change();
        });
        Schema::table('event', function (Blueprint $table) {
            $table->integer('activestatus')->length(1)->default(1)->change();
        });
        Schema::table('eventregistration', function (Blueprint $table) {
            $table->integer('emailstatus')->length(1)->default(0)->change();
        });
        Schema::table('hakakses', function (Blueprint $table) {
            $table->integer('activestatus')->length(1)->default(1)->change();
        });
        Schema::table('menu', function (Blueprint $table) {
            $table->integer('activestatus')->length(1)->default(1)->change();
        });
        Schema::table('news', function (Blueprint $table) {
            $table->integer('activestatus')->length(1)->default(1)->change();
        });
        Schema::table('pagecontent', function (Blueprint $table) {
            $table->integer('activestatus')->length(1)->default(1)->change();
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
