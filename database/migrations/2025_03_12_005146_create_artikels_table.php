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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('kategori');
            $table->uuid('uuid_user');
            $table->string('judul_artikel');
            $table->text('konten');
            $table->string('tanggal_pulbukasi')->nullable();
            $table->string('thumbnail');
            $table->boolean('publikasi')->default(false);
            $table->boolean('set_artikel')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
