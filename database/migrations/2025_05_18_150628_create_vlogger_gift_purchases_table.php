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
        Schema::create('vlogger_gift_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vlogger_id')->constrained('vloggers')->onDelete('cascade');
            $table->foreignId('gift_catalog_id')->constrained('gift_catalog')->onDelete('cascade');
            $table->unsignedInteger('total_quantity')->default(0);
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->timestamps();

            $table->unique(['vlogger_id', 'gift_catalog_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vlogger_gift_purchases');
    }
};
