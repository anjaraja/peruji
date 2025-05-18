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
            $table->string("prefix");
            $table->string("fullname");
            $table->string("suffix");
            $table->date("dob");
            $table->string("phone")->length(20);
            $table->string("email");
            $table->text("photo");
            $table->string("organization");
            $table->string("ofcaddress");
            $table->string("ofcphone");
            $table->string("ofcemail");
            $table->string("website");
            $table->date("joindate");
            $table->string("number");
            $table->date("expiredate");
            $table->string("status")->length(15);
            $table->text("additionaldocument")->nullable();
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
