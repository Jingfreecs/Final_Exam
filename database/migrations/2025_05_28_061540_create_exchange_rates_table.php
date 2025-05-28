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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->char('base_currency', 3);
            $table->char('target_currency', 3);
            $table->decimal('rate', 18, 8);
            $table->date('rate_date');
            $table->string('provider')->nullable;
            $table->timestamps();

            $table->foreign('base_currency')->references('currency_code')->on('currenies')->onDelete('cascade');
            $table->foreign('target_currency')->references('currency_code')->on('currenies')->onDelete('cascade');
            $table->unique(['base_currency', 'target_currency', 'rate_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
