<?php

namespace App\Models;

use App\Helpers\DwollaHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static whereHas(string $string, \Closure $param)
 */
class Dwolla extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ach_customer_id',
        'funding_source_id',
        'funding_source',
        'is_verified',
        'is_active',
        'bank_name',
        'bank_type',
        'account_name',
    ];
    protected $casts = ['is_verified' => 'boolean', 'is_active' => 'boolean'];

    public static function transferMoneyAllActiveUsers($amount): bool
    {
        DwollaHelpers::token();
        $users = self::whereHas('user', function ($query) {
            $query->where('is_active', true);
        })->whereNotNull('funding_source_id')->where(['is_verified' => true, 'is_active' => true])->get();
        foreach ($users as $user) {
            $response = DwollaHelpers::transfer($user, $amount);
            $links = $response->_links;
            $transfer = [
                'user_id' => $user->id,
                'source_user_id' => DwollaHelpers::getLastString($links['source']->href), // Admin ID
                'destination_user_id' => DwollaHelpers::getLastString($links['destination']->href),// ACH Employee id
                'funding_source_id' => DwollaHelpers::getLastString($links['source-funding-source']->href),
                'funding_destination_id' => DwollaHelpers::getLastString($links['destination-funding-source']->href),
                'transaction_id' => $response->id,
                'amount' => $response->amount->value,
                'currency' => $response->amount->currency,
                'status' => ucfirst($response->status),
            ];
            DwollaTransactionHistory::create($transfer);
        }
        return true;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAccountStatusAttribute(): string
    {
        return $this->is_verified ? 'Verified' : 'Not Verified';
    }
}
