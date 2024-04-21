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
        Schema::create('patents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('document');
            $table->date('published_at')->nullable();
            $table->enum('status', ['verified', 'unverified'])->default('unverified');
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patents');
    }
};
