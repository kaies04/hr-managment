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
        Schema::table('loans', function (Blueprint $table) {
            $table->integer('number_of_installment')->after('loan_amount');
            $table->date('finish_date')->after('start_date')->nullable();
            $table->date('actual_finish_date')->after('start_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('number_of_installment');
            $table->dropColumn('finish_date');
            $table->dropColumn('actual_finish_date');
        });
    }
};
