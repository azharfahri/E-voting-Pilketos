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
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id();
            $table->integer('no_urut')->unique();
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            $table->foreignId('id_kelas_ketua')->constrained('kelas');
            $table->foreignId('id_kelas_wakil')->constrained('kelas');
            $table->foreignId('id_periode')->constrained('periodes');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('foto_ketua')->nullable();
            $table->string('foto_wakil')->nullable();
            $table->integer('jumlah_suara')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidats');
    }
};
