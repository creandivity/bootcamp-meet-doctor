<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable()
                    ->index('fk_transaction_to_appointment');
            $table->double('fee_doctor', 15, 3)->nullable();
            $table->double('fee_specialist', 15, 3)->nullable();
            $table->double('fee_hospital', 15, 3)->nullable();
            $table->double('subtotal', 15, 3)->nullable();
            $table->double('vat', 15, 3)->nullable();
            $table->double('total', 15, 3)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
