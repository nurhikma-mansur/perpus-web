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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('cover');
            $table->string('title');
            $table->string('type');
            $table->string('classification_number');
            $table->string('author');
            $table->string('publisher');
            $table->string('isbn');
            $table->string('media_type');
            $table->string('edition');
            $table->string('detail_info');
            $table->string('languange');
            $table->string('content_type');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
