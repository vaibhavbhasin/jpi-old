<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DwollaFundTransferException extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'id', 'updated_at'
    ];
    protected $fillable = [
        'code', 'response_body', 'message'
    ];
}
