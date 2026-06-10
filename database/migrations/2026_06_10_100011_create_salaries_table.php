<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->decimal('basic_salary', 12, 2);
            $table->string('currency', 3)->default('USD');
            $table->enum('pay_frequency', ['monthly', 'biweekly', 'weekly', 'hourly'])->default('monthly');
            $table->date('effective_from');
            $table->date('effective_to')->nullable();
            $table->boolean('is_current')->default(true);
            $table->timestamps();

            $table->index(['employee_id', 'is_current']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
