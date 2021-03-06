{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')
@section('content')
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class='container'>
                    <div class="section">
                        <div class="jpi-main-heading">
                            
                        </div>
                        <div class="card transaction-settings-section section-data-tables">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s2" id="">
                                            <h4 class="card-title">ACH Users</h4>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <!-- Page Length Options -->
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0">
                                        <div class="row no-pad">
                                            <form class="form-inline" method="GET">
                                                <div class="col s11 p0">
                                                    <div class="input-field inline col">
                                                        <a href="javascript:void(0)"
                                                           class="waves-effect waves-light btn-small table_action_active_inactive"
                                                           id="table_action_active" data-for="users" data-status="1">Active</a>
                                                        <a href="javascript:void(0)"
                                                           class="waves-effect waves-light btn-small table_action_active_inactive"
                                                           id="table_action_inactive" data-for="users" data-status="0">Inactive</a>
                                                    </div>
                                                    <div class="input-field inline col">
                                                        <input id="first_name" type="text" name="first_name" value="{{request('first_name')}}">
                                                        <label for="first_name">First Name</label>
                                                    </div>
                                                    <div class="input-field inline col">
                                                        <input id="last_name" type="text" name="last_name" value="{{request('last_name')}}">
                                                        <label for="last_name">Last Name</label>
                                                    </div>
                                                    <div class="input-field inline col">
                                                        <input id="email" type="text" name="email" value="{{request('email')}}">
                                                        <label for="email">Email</label>
                                                    </div>
                                                    <div class="input-field inline col">
                                                        <select id="status" name="status">
                                                            <option value="">Status</option>
                                                            <option value="1" {{request('status') ==='1' ? 'selected' : ''}}>Active</option>
                                                            <option value="0" {{request('status') ==='0' ? 'selected' : ''}}>In Active</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-field inline col">
                                                        <select id="account_status" name="account_status">
                                                            <option value="">Account Status</option>
{{--                                                            <option value="1" {{request('account_status') ==='1' ? 'selected' : ''}}>Not Added</option>--}}
                                                            <option value="3" {{request('account_status') ==='3' ? 'selected' : ''}}>Verified</option>
                                                            <option value="2" {{request('account_status') ==='2' ? 'selected' : ''}}>Not Verified</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col display-flex align-items-center show-btn p0">
                                                    <button type="submit" class="btn btn-block waves-effect waves-light"
                                                            style="bottom: -26px;">Filter
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col s12 p0">
                                        <table id="users_table" class="table-jpi striped responsive-table highlight">
                                            <thead>
                                            <tr>
                                                <th width="15">
                                                    <label><input type="checkbox" name="id" id="check_all"
                                                                  class="filled-in"><span></span></label>
                                                </th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Account Status</th>
                                                <th>Status</th>
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
                                                    
                                                    <td>{{@$user->dwolla ? $user->dwolla->account_status : 'Not Added'}}</td>
													
													<td>
                                                        <div class="switch">
                                                            <label>
                                                                <input type="checkbox"
                                                                       {{$user->is_active ? 'checked': ''}} class="switch_checkbox_update_status"
                                                                       id="switch_checkbox_update_status_{{$user->id}}"
                                                                       value="{{$user->id}}"
                                                                       data-route="{{route('admin.updateStatus','users')}}">
                                                                <span class="lever"></span>
                                                                
                                                            </label>
                                                        </div>
                                                    </td>
													
													
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="6"><h6 class="center">No Data Found</h6></th>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col s6"></div>
                                    <div class="col s6">{!! $users->appends(request()->all())->render() !!}</div>
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
