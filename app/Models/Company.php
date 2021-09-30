<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'temp_companies';
    protected $fillable = ['company_name', 'company_type', 'created_date', 'region'];
}
