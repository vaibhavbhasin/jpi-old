<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    public function blankPage()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Blank Page"],
        ];
        //Pageheader set true for breadcrumbsqq
        $pageConfigs = ['pageHeader' => true];
        return view('pages.page-blank', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }
    public function employeeDashboard()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Employee"], ['name' => "Dashboard"],
        ];
        //Pageheader set true for breadcrumbsqq
        $pageConfigs = ['pageHeader' => true];
        return view('pages.page-employee-dashboard', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }
    public function collapsePage()
    {
		// dd(Auth::user());
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Page Collapse"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'bodyCustomClass' => 'menu-collapse'];

        return view('pages.page-collapse', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }
}
