<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
class TestController extends Controller
{
    public function index(){

        // Permission::create(['name'=>'edit']);
        $role = Role::findById(auth()->user()->role_id);
        $permission = Permission::findById(auth()->user()->role_id);
        
        $role->givePermissionTo($permission);
        dd($permission);
        // auth()->user()->givePermissionTo('create');;
        // auth()->user()->assignRole('admin_view');;

        // dd(auth()->user()->role_id);
        return auth()->user()->permissions;
        return "Test";
    }
}
