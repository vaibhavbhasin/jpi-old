<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DwollaTransactionHistory;
use Illuminate\Http\Request;

//use Carbon\Carbon;
class PaymentController extends Controller
{
    private $page_data;

    public function __construct()
    {
        $this->page_data = [
            'isAdmin' => true,
        ];
    }
    public function index(Request $request)
    {

		$query =DwollaTransactionHistory::with('user');
        if (!empty($request->from_date_filter) && !empty($request->to_date_filter)) {

            //$from = Carbon::make($request->from_date_filter)->format('Y-m-d');
           // $to = Carbon::make($request->to_date_filter)->format('Y-m-d');

			$from = date('Y-m-d',strtotime($request->from_date_filter));
			$to = date('Y-m-d',strtotime($request->to_date_filter));
            $query->whereBetween('created_at', [$from, $to])->get();
        }
        $this->page_data['payments'] = $query->latest()->paginate(config('jpi.per_page'));

        return view('pages.admin.payments.index', $this->page_data);
    }
}
