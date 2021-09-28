<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DwollaTransactionHistory;
use App\Models\User;
use EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PhoneReimbursementController extends Controller
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
        $query = EloquentBuilder::to(User::class, $request->only('first_name', 'last_name', 'email', 'status'));
        if (!empty($request->account_status)) {
            $account_status = $request->account_status === '3';
            $query->selectRaw('users.*,dwollas.is_verified as is_verified')->join('dwollas', function ($join) use ($account_status) {
                $join->on('dwollas.user_id', '=','users.id')->where('dwollas.is_verified', $account_status);
            });
        } else {
            $query->selectRaw('users.*,dwollas.is_verified as is_verified')->join('dwollas', function ($join) {
                $join->on('dwollas.user_id', '=','users.id' );
            });
        }
        $this->page_data['users'] = $query->role('employee')->latest('users.id')->paginate(config('jpi.per_page'));
        $query = DwollaTransactionHistory::with('user');
        if (!empty($request->from_date_filter) && !empty($request->to_date_filter)) {
            $from = str_replace("-", "/", $request->from_date_filter);
            $from = date('Y-m-d', strtotime($from));
            $to = str_replace("-", "/", $request->to_date_filter);
            $to = date('Y-m-d', strtotime($to));
            $query->whereBetween('created_at', [$from, $to])->get();

        }
        $this->page_data['payments'] = $query->latest()->paginate(config('jpi.per_page'));
        return view('pages.admin.phonereimbursement', $this->page_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
