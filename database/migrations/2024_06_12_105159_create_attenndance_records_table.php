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
        Schema::create('attenndance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Teacher::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('timestamp')->useCurrent();
            $table->timestamp('sign_in')->nullable();
            $table->timestamp('sign_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attenndance_records');
    }
};
