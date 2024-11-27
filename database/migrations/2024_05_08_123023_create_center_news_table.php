<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('center_news', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['center_news','scientific_papers'])->default('center_news');
            $table->string('writer_name')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('desc_ar')->nullable();
            $table->longText('desc_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_news');
    }
};
