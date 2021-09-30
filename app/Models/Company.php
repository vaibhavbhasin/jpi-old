<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'temp_companies';
    protected $fillable = ['company_name', 'company_type', 'created_date', 'region'];
    public function getDateAttribute(): string
    {
        return Carbon::make($this->created_date)->format(config('jpi.date_format'));
    }
}
