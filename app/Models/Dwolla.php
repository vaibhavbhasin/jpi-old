<?php

namespace App\Models;

use App\Helpers\DwollaHelpers;
use App\Mail\DwollaFundTransferExceptionOccur;
use DwollaSwagger\ApiException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;


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
        })->doesnthave('history')->whereNotNull('funding_source_id')->where(['is_verified' => true, 'is_active' => true])->get();
        $totalTransfer = 0;
        foreach ($users as $user) {
            $userudArr = array(74,112,150,47,104,78,146,87);
			if (!in_array($user->user_id, $userudArr))
			  {
						try {
							$response = DwollaHelpers::transfer($user, $amount);
							if (!empty($response->_links)) {
								$links = $response->_links;
								$transfer = [
									'user_id' => $user->user_id,
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
								$totalTransfer++;
							}
						} catch (ApiException $exception) {
							$dwolla = DwollaFundTransferException::create([
								'code' => $exception->getCode(),
								'response_body' => $exception->getResponseBody(),
								'message' => $exception->getMessage()
							]);
							Mail::to(config('jpi.admin_mail'))->send(new DwollaFundTransferExceptionOccur($dwolla));
						}
			  }
        }
        return $totalTransfer;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function history(): BelongsTo
    {
        return $this->belongsTo(DwollaTransactionHistory::class, 'user_id', 'user_id');
    }

    public function getAccountStatusAttribute(): string
    {
        return $this->is_verified ? 'Verified' : 'Not Verified';
    }
}
