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
        Schema::create('grupakses', function (Blueprint $table) {
            $table->id();
            $table->string("groupname");
            $table->integer("activestatus")->length(1);
            $table->string("created_by");
            $table->string("modified_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupakses');
    }
};
