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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("newsname");
            $table->date("newsdate");
            $table->string("description");
            $table->text("photo");
            $table->text("additionalcontent")->nullable();
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
        Schema::dropIfExists('news');
    }
};
