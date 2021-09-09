<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                        ];
}
