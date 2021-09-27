<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDwollaFundTransferExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dwolla_fund_transfer_exceptions', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->nullable();
            $table->longText('response_body')->nullable();
            $table->longText('message')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dwolla_fund_transfer_exceptions');
    }
}
