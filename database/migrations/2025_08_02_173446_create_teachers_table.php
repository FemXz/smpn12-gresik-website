<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('nip')->nullable()->unique();
            $table->string('position');
            $table->string('subject')->nullable();
            $table->string('education')->nullable();
            $table->string('career_level')->nullable(); // jenjang karir
            $table->string('experience')->nullable(); // contoh "10+ Tahun" atau angka
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};


