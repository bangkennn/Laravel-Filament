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
        Schema::create('setting_seo', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title', 150)->nullable()->comment('Judul halaman untuk SEO');
            $table->string('meta_description', 255)->nullable()->comment('Deskripsi halaman untuk SEO');
            $table->string('meta_keywords', 255)->nullable()->comment('Kata kunci SEO');
            $table->string('robots', 50)->nullable()->comment('Nilai meta robots (index, follow, noindex, dll)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_seo');
    }
};
