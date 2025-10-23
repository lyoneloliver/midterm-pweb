<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('grading_scales', function (Blueprint $table) {
            $table->id();
            $table->string('grade', 2);
            $table->integer('min_score');
            $table->integer('max_score');
            $table->decimal('grade_point', 3, 2);
        });
    }

    public function down(): void {
        Schema::dropIfExists('grading_scales');
    }
};
