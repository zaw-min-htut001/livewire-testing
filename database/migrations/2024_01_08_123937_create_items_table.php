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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('category_id');
            $table->integer('price');
            $table->text('description');
            $table->enum('item_condition', ['new', 'use','goodSecondHand']);
            $table->enum('item_type', ['sell', 'buy','exchange']);
            $table->boolean('status')->nullable();
            $table->string('photo');
            $table->string('owner_name');
            $table->string('contact');
            $table->text('address');
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
