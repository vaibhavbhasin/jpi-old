<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function bulkUpdateStatus(Request $request): JsonResponse
    {
        if (!empty($request->table) && !empty($request->ids) && isset($request->status)) {
            if ($request->table === 'users') {
                $users = User::with('dwolla')->whereIn('id', $request->ids)->get();
                foreach ($users as $user) {
                    $user->is_active = $request->status;
                    $user->save();
                }
            } else {
                DB::table($request->table)->whereIn('id', $request->ids)->update(['is_active' => $request->status]);
            }
        }
        return response()->json(array('msg' => 'success'));
    }

    public function updateStatus(Request $request, $table): JsonResponse
    {
        if ($table === 'users') {
            $user = User::find($request->id);
            $user->is_active = $request->active;
            $user->save();
        } else {
            DB::table($table)->where('id', $request->id)->update(['is_active' => $request->active]);
        }
        return response()->json(array('msg' => 'success'));
    }
}
