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
        Schema::create('exchange_requests_', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->char('base_currency', 3);
            $table->char('target_currency', 3);
            $table->decimal('amount', 18, 4);
            $table->decimal('convert_amount', 18, 4)->nullable();
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamps();

            $table->foreign('base_currency')->references('currency_code')->on('currencies')->onDelete('cascade');
            $table->foreign('target_currency')->references('currency_code')->on('currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_requests_');
    }
};
