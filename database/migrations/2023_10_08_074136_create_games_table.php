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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_one_id')->nullable();
            $table->foreignId('user_two_id')->nullable();
            $table->string('state', 10);
            $table->text('moves')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->foreign('user_one_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('user_two_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
