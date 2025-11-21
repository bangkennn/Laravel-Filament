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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->comment('Judul halaman');
            $table->string('slug', 150)->unique()->comment('Slug unik (contoh: about-us, privacy-policy)');
            $table->longText('content')->nullable()->comment('Isi konten halaman (HTML/Markdown)');
            $table->string('featured_image', 255)->nullable()->comment('(opsional) gambar utama');
            $table->string('meta_title', 150)->nullable()->comment('Judul SEO halaman');
            $table->string('meta_description', 255)->nullable()->comment('Deskripsi SEO');
            $table->string('meta_keywords', 255)->nullable()->comment('Kata kunci SEO');
            $table->boolean('is_published')->default(false)->comment('Status publikasi');
            $table->dateTime('published_at')->nullable()->comment('Tanggal publikasi');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('Pembuat halaman');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('Pengedit terakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
