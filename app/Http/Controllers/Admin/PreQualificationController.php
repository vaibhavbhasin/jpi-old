<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PreQualificationController extends Controller
{
    private $page_data;

    public function __construct()
    {
        $this->page_data = [
            'isAdmin' => true,
            'page_name'=>'Trade Partner Portal: Pre-Qualification'
        ];
    }
    public function index()
    {
        return view('trade_partners.admin.pre_qualification.index',$this->page_data);
    }
}