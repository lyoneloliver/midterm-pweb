<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_section_id')->constrained('class_sections')->cascadeOnDelete();
            $table->enum('day', ['Mon','Tue','Wed','Thu','Fri','Sat']);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room', 50)->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('class_schedules');
    }
};
