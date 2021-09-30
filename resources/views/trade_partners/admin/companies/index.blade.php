{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')
{{-- page content --}}
@section('content')
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class='container'>
                    <div class="section">
                        <div class="jpi-main-heading"></div>
                        <div class="card account-settings-section section-data-tables">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l10" id="accsett">
                                            <h4 class="card-title">Applications</h4>
                                        </div>
                                        <div class="col s12 m6 l2 text-right">
                                            <select id="" name="">
                                                <option value="1">My Tasks</option>
                                                <option value="0">All Apps</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <!-- Page Length Options -->
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0">
                                        <table id="multi-select" class="display">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <label>
                                                        <input type="checkbox" class="select-all"/>
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th>Date</th>
                                                <th>EIN</th>
                                                <th>Company</th>
                                                <th>Contact</th>
                                                <th>Project</th>
                                                <th>Single</th>
                                                <th>Aggregate</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456124</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456125</td>
                                                <td>Edinburgh I</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456120</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456189</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton submitted"
                                                       id="">Submitted</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton approved"
                                                       id="">Approved</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>09-21-2021</td>
                                                <td>78-9456123</td>
                                                <td>Edinburgh</td>
                                                <td>Tyler Barton</td>
                                                <td>DJ</td>
                                                <td>$320,800</td>
                                                <td>$320,800</td>
                                                <td><a href="javascript:void(0)"
                                                       class="waves-effect waves-light btn-small appstatusbutton" id="">Active</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-overlay"></div> <!-- add class "show" -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
@endsection
