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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statement_month_id')
                ->constrained('statement_months')
                ->cascadeOnDelete();
            $table->enum('type', ['payment', 'rolling']);
            $table->decimal('amount', 12, 2);
            $table->dateTime('amount_date')->index();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['statement_month_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
