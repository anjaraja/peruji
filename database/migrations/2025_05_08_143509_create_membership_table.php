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
        Schema::create('membership', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->char("gender")->length(1);
            $table->string("email");
            $table->string("phone");
            $table->date("dob");
            $table->string("org")->nullable();
            $table->text("address")->nullable();
            $table->string("website")->nullable();
            $table->string("ofcemail")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership');
    }
};
