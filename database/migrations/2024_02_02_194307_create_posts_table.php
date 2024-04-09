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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
            ->constrained('categories')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('title')->comment('Заголовок');
            $table->string('description')->comment('Описание');
            $table->date('publication_date');
            $table->longText('content');
            $table->string('photo')->nullable();
            $table->string('author', 50);
            $table->timestamps();
        });

        $seeder = new  \Database\Seeders\PostSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
