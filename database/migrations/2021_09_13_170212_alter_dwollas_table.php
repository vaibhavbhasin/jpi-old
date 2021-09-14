<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDwollasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dwollas', function (Blueprint $table) {
            $table->string('bank_name')->nullable()->after('funding_source_id');
            $table->string('bank_type')->nullable()->after('bank_name');
            $table->string('account_name')->nullable()->after('bank_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dwollas', function (Blueprint $table) {
            //
        });
    }
}
