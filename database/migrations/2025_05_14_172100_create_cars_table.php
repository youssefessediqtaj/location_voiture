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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->integer('mileage');
            $table->date('purchase_date');
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available');
            $table->decimal('daily_price', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
