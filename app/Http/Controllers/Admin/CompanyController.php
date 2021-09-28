<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    private $page_data;

    public function __construct()
    {
        $this->page_data = [
            'isAdmin' => true,
            'page_name'=>'Trade Partner Portal: Companies'
        ];
    }
    public function index()
    {
        return view('trade_partners.admin.companies.index',$this->page_data);
    }
}
