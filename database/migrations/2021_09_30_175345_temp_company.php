<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TempCompany extends Migration
{
    public function up()
    {
        Schema::table('temp_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ein_number');
            $table->string('company');
            $table->string('contact');
            $table->string('project');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_companies');
    }
}
