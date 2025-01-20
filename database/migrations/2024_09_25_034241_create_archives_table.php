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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('filename');
            $table->string('name');
            $table->string('nim');
            $table->string('major');
            $table->string('graduation_year');
            $table->string('title');
            $table->string('classification_number');
            $table->json('instructors');
            $table->json('subjects');
            $table->string('weeding');
            $table->date('weeding_date')->nullable();
            $table->text('abstract');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
