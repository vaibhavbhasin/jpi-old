<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DwollaTransactionHistory;
use App\Models\User;

class PaymentController extends Controller
{
    private $page_data;

    public function __construct()
    {
        $this->page_data = [
            'isAdmin' => true,
        ];
    }
    public function index()
    {
        $this->page_data['payments'] = DwollaTransactionHistory::with('user')->latest()->paginate(config('jpi.per_page'));
//        dd($this->page_data['payments']);
        return view('pages.admin.payments.index', $this->page_data);
    }
}
