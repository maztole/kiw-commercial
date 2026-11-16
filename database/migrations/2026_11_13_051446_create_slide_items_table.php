<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('slide_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slide_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('url')->nullable();
            $table->string('action_type')->default('link'); // link, whatsapp, modal_inquiry, modal_detail, call, map
            $table->string('badge')->nullable();
            $table->string('icon')->nullable();
            $table->text('detail_content')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slide_items');
    }
};
