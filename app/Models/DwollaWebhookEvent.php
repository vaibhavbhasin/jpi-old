<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DwollaWebhookEvent extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'topic', 'event_id', 'resource_id', 'payload', 'action'
    ];
    protected $casts = [
        'payload' => 'json',
        'action' => 'boolean'
    ];
}
