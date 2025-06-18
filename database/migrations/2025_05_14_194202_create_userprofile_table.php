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
        Schema::create('userprofile', function (Blueprint $table) {
            $table->id();
            $table->integer("userid")->length(11);
            $table->string("prefix")->nullable();
            $table->string("fullname")->nullable();
            $table->string("suffix")->nullable();
            $table->date("dob")->nullable();
            $table->string("phone")->length(20)->nullable();
            $table->string("email")->nullable();
            $table->text("photo")->nullable();
            $table->string("organization")->nullable();
            $table->string("ofcaddress")->nullable();
            $table->string("ofcphone")->nullable();
            $table->string("ofcemail")->nullable();
            $table->string("website")->nullable();
            $table->date("joindate")->nullable();
            $table->string("number")->nullable();
            $table->date("expiredate")->nullable();
            $table->string("status")->length(15)->nullable();
            $table->text("additionaldocument")->nullable()->nullable();
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
        Schema::dropIfExists('userprofile');
    }
};
