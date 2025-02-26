<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('quantity')->default(1);
            $table->string('image')->nullable(); // Path to the image file
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // If items belong to users
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
