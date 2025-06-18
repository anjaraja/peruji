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
        Schema::create('eventregistration', function (Blueprint $table) {
            $table->id();
            $table->string("eventregistrationname");
            $table->string("fullname");
            $table->string("email");
            $table->string("phone");
            $table->string("ofcphone")->nullable();
            $table->string("company")->nullable();
            $table->string("address")->nullable();
            $table->integer("emailstatus")->length(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventregistration');
    }
};
