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
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('user_id'); // Kullanıcının ID'si
            $table->boolean('is_edited')->default(false); // Düzenleme durumu
            $table->unsignedBigInteger('edit_user_id')->nullable(); // Düzenleyen kullanıcı ID'si
            $table->timestamps();

            // Foreign key tanımlamaları
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('edit_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
