<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreQualification;

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
        $this->page_data['tableData'] = PreQualification::latest()->paginate(config('jpi.per_page'));
        return view('trade_partners.admin.pre_qualification.index',$this->page_data);
    }
    public function show(PreQualification $id)
    {
		$this->page_data['data']=$id;
        return view('trade_partners.admin.pre_qualification.detail',$this->page_data);
    }
	
	public function showviewapp(PreQualification $id)
    {
		$this->page_data['data']=$id;
        return view('trade_partners.admin.pre_qualification.view',$this->page_data);
    }
}
