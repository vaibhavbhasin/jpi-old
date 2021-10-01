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
                                    <div class="col s12 m6 l12" id="">
                                        <h4 class="card-title">Company</h4>
                                    </div>
                                </div>
                                <div id="apj-acctxt-border"></div>
                            </div>
                            <div class="row" id="company_details">
                                <div class="col s12">
                                    <form>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input id="first_name01" type="text" required>
                                                <label for="first_name01">Federal Employer ID Number</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input id="last_name" type="text">
                                                <label for="last_name">Company Name</label>
                                            </div>
                                            <div class="input-field col m12 s12 jpi_companytype_div">
                                                Company Type:
                                                <div class="input-field inline">
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" value="Corporation" />
                                                            <span>Corporation</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" value="Individual" />
                                                            <span>Individual</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" value="L.L.C." />
                                                            <span>L.L.C.</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" value="Partnership" />
                                                            <span>Partnership</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" value="Joint Venture" />
                                                            <span>Joint Venture</span>
                                                        </label>
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col s2 attach_drop_list_label0">
                                                <span class=""> Operating Region: </span>
                                            </div>
                                            <div class="col s4 attach_drop_list">
                                                <select id="attach_drop_list" name="attach_drop_list">
                                                    <option value="">San Antonio</option>
                                                    <option value="1">Dallas</option>
                                                    <option value="0">Houston</option>
                                                    <option value="0">Austin</option>
                                                </select>
                                            </div>
                                        </div>

                                </div>

                                </form>

                            </div>
                            <div id="apj-acctxt-border"></div>
                            <div class="row">
                                <div class="col s12 m12" id="">
                                    <div id="card-panel-type" class="section">
                                        <h4 class="card-title">Company Diversity</h4>
                                        <div class="row">
                                            <div class="col s4 attach_drop_list_label">
                                                <span class=""> Do you qualify as a Minority Owned Business? </span>
                                            </div>
                                            <div class="col s2 attach_drop_list">
                                                <select id="attach_drop_list" name="attach_drop_list">
                                                    <option value="">Please select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col s4"></div>
                                        </div>
                                        <div class="row" id="data-table-starts">
                                            <div class="col s12 binfopad">
                                                <table id="" class="display table-jpi certification_table tableone">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>Certification Type</th>
                                                            <th>Ownership Ethnicity</th>
                                                            <th>Gender</th>
                                                            <th>Certificate #</th>
                                                            <th>Expiration</th>
                                                            <th>Agency</th>
                                                            <th>Upload Certificate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Edinburgh</td>
                                                            <td>Edinburgh</td>
                                                            <td>Insurance</td>
                                                            <td>Insurance</td>
                                                            <td>Edinburgh</td>
                                                            <td>Insurance</td>
                                                            <td>Edinburgh</td>
                                                            <td>Edinburgh</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="row apj_last_fms">
                                            <div class="col s11">
                                                <a href="javascript:void(0)" class="waves-effect waves-light btn-small " id="">Apply Change(s)</a>
                                                <a href="javascript:void(0)" class="waves-effect waves-light btn-small " id="">Save</a>
                                                <a href="javascript:void(0)" class="waves-effect waves-light btn-small  apj-cancel-btn" id="">Cancel</a>

                                            </div>
                                        </div>
                                        <div id="apj-acctxt-border"></div>
                                        <div class="row">
                                            <div class="col s3">
                                                <a href="javascript:void(0)" class="waves-effect waves-light btn-small inviteuser" id="" style="display: inline-flex;"><i class="material-icons">person_outline</i> Invite Users</a>
                                            </div>
                                        </div>
                                        <div class="row" style="display: none;">
                                            <div class="col s3">
                                                <div class="input-field col s12">
                                                    <input id="first_name1" type="text">
                                                    <label for="first_name1">Enter email address</label>
                                                </div>

                                            </div>
                                            <div class="col s4">



                                                <a href="javascript:void(0)" class="waves-effect waves-light btn-small inviteuser" id="" style="display: inline-flex;">Send</a>
                                                <a href="javascript:void(0)" class="waves-effect waves-light btn-small  apj-cancel-btn" id="">Cancel</a>
                                            </div>
                                        </div>
                                        <div class="row" id="data-table-starts">
                                            <div class="col s12 binfopad">
                                                <table id="tabletwo" class="display table-jpi certification_table">
                                                    <thead>
                                                        <tr>
                                                            <th>User Email</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Primary User</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>user@gmail.com</td>
                                                            <td>Test</td>
                                                            <td>User</td>
                                                            <td>
                                                                <div class="switch">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>user@gmail.com</td>
                                                            <td>Test</td>
                                                            <td>User</td>
                                                            <td>
                                                                <div class="switch">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>user@gmail.com</td>
                                                            <td>Test</td>
                                                            <td>User</td>
                                                            <td>
                                                                <div class="switch">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>user@gmail.com</td>
                                                            <td>Test</td>
                                                            <td>User</td>
                                                            <td>
                                                                <div class="switch">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END: Page Main-->
@endsection
@section('customjs')
