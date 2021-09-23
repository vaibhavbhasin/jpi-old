<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function bulkUpdateStatus(Request $request)
    {
        if (!empty($request->table) && !empty($request->ids)&& isset($request->status)) {
            return DB::table($request->table)->whereIn('id', $request->ids)->update(['is_active' => $request->status]);
        }
    }
    public function updateStatus(Request $request, $table)
    {
        DB::table($table)->where('id', $request->id)->update(['is_active' => $request->active]);
        return response()->json(array('msg' => 'success'));
    }
}
