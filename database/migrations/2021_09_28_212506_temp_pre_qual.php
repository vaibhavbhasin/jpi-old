<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('temp_prequels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('submitted_date');
            $table->string('ein_number');
            $table->string('company');
            $table->string('contact');
            $table->string('project');
            $table->double('single', 10, 2);
            $table->double('aggregate', 10, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_prequels');
    }
};
