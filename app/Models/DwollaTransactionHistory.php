<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DwollaTransactionHistory extends Model
{
    use SoftDeletes;

    protected $table = 'dwolla_transaction_histories';
    protected $fillable = [
        'user_id',
        'transaction_id',
        'source_user_id',
        'destination_user_id',
        'funding_source_id',
        'funding_destination_id',
        'amount',
        'currency',
        'status',
    ];
    protected $with = ['user'];

    public function getCreatedDateAttribute($key)
    {
        return Carbon::parse($this->created_at)->format(config('jpi.date_format'));
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
