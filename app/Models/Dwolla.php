<?php

namespace App\Models;

use App\Helpers\DwollaHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Expr\Cast\Double;

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

    public static function transferMoneyAllActiveUsers($amount)
    {
        DwollaHelpers::token();
        $users = self::whereHas('user', function ($query) {
            $query->where('is_active', true);
        })->whereNotNull('funding_source_id')->where(['is_verified' => true, 'is_active' => true])->get();
        $transfer=[];
        foreach ($users as $user) {
            $transfer[] = DwollaHelpers::transfer($user,$amount);
        }
        return count($transfer);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
