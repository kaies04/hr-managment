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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->integer('leave_type')->default('0')->comment('0: Casual, 1: Sick, 2: Unpaid');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status')->default('0')->comment('0: Pending, 1: Approved, 2: Rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
