<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('approval_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('approved_by')->constrained('users')->cascadeOnDelete();
            $table->string('action', 50)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('approval_logs');
    }
};
