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
        Schema::create('nova_seo_metas', function (Blueprint $table) {
            $table->id();
            $table->morphs('indexable');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('focus_keyword')->nullable();
            $table->unsignedSmallInteger('focus_keyword_score')->nullable();
            $table->unsignedSmallInteger('readability_score')->nullable();
            $table->string('canonical_url')->nullable();
            $table->boolean('is_robots_noindex')->default(false);
            $table->boolean('is_robots_nofollow')->default(false);
            $table->string('image')->nullable();
            $table->json('image_meta')->nullable();
            $table->unsignedSmallInteger('estimated_reading_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nova_seo_metas');
    }
};
