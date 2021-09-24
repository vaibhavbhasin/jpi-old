<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDwollaWebhookEventsTable extends Migration
{
    public function up()
    {
        Schema::create('dwolla_webhook_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('topic')->nullable()->comment('Type of action that occurred with Dwolla.');
            $table->string('event_id')->nullable()->comment('Unique Event Id. An Event Id is used along with the created timestamp for idempotent event processing.');
            $table->string('resource_id')->nullable()->comment('Unique Id of the resource that triggered the Event.');
            $table->longText('payload')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dwolla_webhook_events');
    }
}
