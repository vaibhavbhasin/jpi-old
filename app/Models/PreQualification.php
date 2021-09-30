<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreQualification extends Model
{
    use HasFactory;

    protected $table = 'temp_prequels';

    protected $fillable = [
        'submitted_date', 'ein_number', 'contact', 'company', 'project', 'single', 'aggregate', 'status'
    ];
    protected $casts = [
        'submitted_date' => 'date:Y-m-d'
    ];

    public function getDateAttribute(): string
    {
        return Carbon::make($this->submitted_date)->format(config('jpi.date_format'));
    }
}
