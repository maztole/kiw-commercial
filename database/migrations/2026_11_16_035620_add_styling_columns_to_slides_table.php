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
        Schema::table('slides', function (Blueprint $table) {
            $table->string('banner_grad')->nullable()->after('banner_text');
            $table->string('card_bg')->nullable()->after('banner_grad');
            $table->string('card_text')->nullable()->after('card_bg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn(['banner_grad', 'card_bg', 'card_text']);
        });
    }
};
