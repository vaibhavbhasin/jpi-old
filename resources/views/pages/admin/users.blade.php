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
                            <p>This page contains list of ACH users</p>
                        </div>
                        <div class="card transaction-settings-section section-data-tables">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l10" id="">
                                            <h4 class="card-title">ACH Users</h4>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <!-- Page Length Options -->
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0">
                                        <div class="col s6">
                                            <a href="javascript:void(0)" class="waves-effect waves-light btn-small table_action_active_inactive" id="table_action_active" data-for="users" data-status="1">Active</a>
                                            <a href="javascript:void(0)" class="waves-effect waves-light btn-small table_action_active_inactive" id="table_action_inactive" data-for="users" data-status="0">In Active</a>
                                        </div>
                                        <div class="col s6">

                                        </div>
                                    </div>
                                    <div class="col s12 p0">
                                        <table id="users_table" class="striped responsive-table highlight">
                                            <thead>
                                            <tr>
                                                <th width="15">
                                                    <label><input type="checkbox" name="id" id="check_all" class="filled-in"><span></span></label>
                                                </th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Account Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($users as $user)
                                                <tr>
                                                    <td>
                                                        <label><input type="checkbox" name="ids" id="user_id" class="check filled-in" value="{{$user->id}}"><span></span></label>
                                                    </td>
                                                    <td>{{$user->firstname}}</td>
                                                    <td>{{$user->lastname}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        <div class="switch">
                                                            <label>
                                                                Not Active
                                                                <input type="checkbox" {{$user->is_active ? 'checked': ''}} class="switch_checkbox_update_status" id="switch_checkbox_update_status_{{$user->id}}" value="{{$user->id}}" data-route="{{route('admin.updateStatus','users')}}">
                                                                <span class="lever"></span>
                                                                Active
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{@$user->dwolla ? $user->dwolla->account_status : 'Not Added'}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>No Data Found</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        {!! $users->render() !!}
                                    </div>
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
