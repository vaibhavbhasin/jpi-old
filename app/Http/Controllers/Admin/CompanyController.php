<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    private $page_data;

    public function __construct()
    {
        $this->page_data = [
            'isAdmin' => true,
            'page_name' => 'Trade Partner Portal: Companies'
        ];
    }

    public function index()
    {
        $this->page_data['tableData'] = Company::latest()->paginate(config('jpi.per_page'));
        return view('trade_partners.admin.companies.index', $this->page_data);
    }

    public function show()
    {
        return view('trade_partners.admin.companies.detail', $this->page_data);
    }
}
