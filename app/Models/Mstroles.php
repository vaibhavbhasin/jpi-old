<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mstroles extends Model
{
	protected $table = 'mst_roles';
	protected $primaryKey = 'role_id';
    use HasFactory;
	public static function querySelect(  ){
		
		return "  SELECT mst_roles.* FROM mst_roles  ";
	}	
}
