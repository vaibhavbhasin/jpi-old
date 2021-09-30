<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreQualification extends Model
{
    use HasFactory;
    protected $table = 'temp_prequels';

    protected $fillable = [
        'submitted_date', 'ein_number','contact','company','project','single','aggregate','status'
    ];
}
