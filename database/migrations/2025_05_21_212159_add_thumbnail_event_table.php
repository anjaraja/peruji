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
        Schema::table('event', function (Blueprint $table) {
            $table->text('banner')->nullable()->after('description');
            $table->text('thumbnail')->nullable()->after('banner');
            $table->text('additionalcontent')->nullable()->after('agenda');
            $table->text('photo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event', function (Blueprint $table) {
            $table->dropColumn('banner');
            $table->dropColumn('thumbnail');
            $table->dropColumn('additionalcontent');
        });
    }
};
