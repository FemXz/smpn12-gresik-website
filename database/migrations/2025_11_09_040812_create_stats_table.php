<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->integer('students')->default(0);
            $table->integer('teachers')->default(0);
            $table->integer('staff')->default(0);
            $table->integer('achievements')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->dropColumn(['students', 'teachers', 'staff', 'achievements']);
        });
    }
};
