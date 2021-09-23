{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')
@section('content')
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class='container'>
                    <div class="section">
                        <div class="jpi-main-heading">
                            <h2>Welcome {{Auth::user()->firstname}} </h2>
                            <p>This page contains list of ACH Payments</p>
                        </div>
                        <div class="card transaction-settings-section section-data-tables">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l10" id="">
                                            <h4 class="card-title">ACH Payments</h4>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <!-- Page Length Options -->
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0">
                                        <table id="dwolla_transaction_histories_table" class="table-jpi striped responsive-table highlight">
                                            <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Transaction ID</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($payments as $payment)
                                                <tr>
                                                    <td>{{$payment->user->full_name}}</td>
                                                    <td>{{$payment->user->email}}</td>
                                                    <td>{{$payment->transaction_id}}</td>
                                                    <td>{{$payment->amount}} {{$payment->currency}}</td>
                                                    <td>{{@$payment->status}}</td>
                                                    <td>{{$payment->created_date}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>No Data Found</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col s6"></div>
                                    <div class="col s6">{!! $payments->appends(request()->all())->render() !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customjs')
@endsection
