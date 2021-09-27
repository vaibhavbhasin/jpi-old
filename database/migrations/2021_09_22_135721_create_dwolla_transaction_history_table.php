<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDwollaTransactionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dwolla_transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('transaction_id')->nullable();
            $table->string('source_user_id')->nullable()->comment('Sender Account ID');
            $table->string('destination_user_id')->nullable()->comment('Receiver Account ID');
            $table->string('funding_source_id')->nullable()->comment('Sender Funding ID');
            $table->string('funding_destination_id')->nullable()->comment('Receiver Funding ID');
            $table->double('amount','10','2')->nullable();
            $table->string('currency',5)->nullable();
            $table->string('status',25)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dwolla_transaction_histories');
    }
}
