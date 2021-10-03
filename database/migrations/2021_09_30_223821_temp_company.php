<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('temp_companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('company_name');
            $table->string('company_type');
            $table->string('region');
            $table->date('created_date');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_companies');
    }
};
