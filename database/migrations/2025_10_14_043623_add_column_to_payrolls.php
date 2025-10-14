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
        Schema::table('payrolls', function (Blueprint $table) {
            $table->decimal('loan_deduction', 10, 2)->default(0)->after('allowances');
            $table->string('total_present')->default(0)->after('loan_deduction');
            $table->string('total_absent')->default(0)->after('total_present');
            $table->decimal('deduction_for_absent', 10, 2)->default(0)->after('total_absent');
            $table->integer('payment_status')->default(0)->after('net_salary')->comment('0 = Unpaid, 1 = Paid');
            $table->integer('status')->default(0)->after('payment_status')->comment('0 = regular, 1 = Hold');
            $table->string('remarks')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropColumn(['loan_deduction', 'total_present', 'total_absent', 'deduction_for_absent']);
        });
    }
};
