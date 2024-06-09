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
        Schema::create('credits', function (Blueprint $table) {
            $table->id('credit_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('loan_amount', 10, 2);
            $table->integer('term'); // Срок кредита в месяцах
            $table->decimal('interest_rate', 5, 2);
            $table->decimal('monthly_payment', 10, 2);
            $table->date('loan_date');
            $table->unsignedBigInteger('company_id'); // Добавляем поле company_id
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade'); // Связываем с таблицей companies
            $table->timestamps();
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
