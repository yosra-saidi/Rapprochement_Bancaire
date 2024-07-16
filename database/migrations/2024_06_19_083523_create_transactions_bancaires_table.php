<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions_bancaires', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2);
            $table->date('date_transaction');
            $table->foreignId('payeur')->constrained('clients')->onDelete('cascade');
            $table->string('etat')->default('non utilisée');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions_bancaires');
    }
};
