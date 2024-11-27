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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['lecture','session','scientific_paper']);
            $table->foreignId('program_id')->nullable()->constrained('programs')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_id')->nullable()->constrained('lectures')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->string('writer_name')->nullable();
            $table->string('first_title_ar')->nullable();
            $table->string('first_title_en')->nullable();
            $table->string('second_title_ar')->nullable();
            $table->string('second_title_en')->nullable();
            $table->longText('desc_ar')->nullable();
            $table->longText('desc_en')->nullable();
            $table->string('job_title_ar')->nullable();
            $table->string('job_title_en')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
