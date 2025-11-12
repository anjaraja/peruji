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
        Schema::create('membership_benefit', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("description");
            $table->integer("activestatus")->default(1);
            $table->text("created_by");
            $table->text("modified_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_benefit');
    }
};
